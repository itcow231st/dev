<?php

namespace App\Services;

use App\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected string $key = 'cart';
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new Products();
    }

    // public function get(): array
    // {
    //     return Session::get($this->key, []);
    // }

    public function get(): array
    {
        if (Auth::guard('web')->check()) {

            $user = Auth::guard('web')->user();

            // 🔥 BẮT BUỘC gọi () để lấy Collection
            return $user->carts()
                ->with('product')
                ->get()
                ->keyBy('product_id')
                ->map(fn($item) => [
                    'id'    => $item->product_id,
                    'name'  => $item->product->name ?? '',
                    'image' => $item->product->image ?? '',
                    'qty'   => $item->qty,
                    'price' => $item->price,
                    'total' => $item->qty * $item->price,
                ])
                ->toArray();
        }

        return session('cart', []);
    }

    public function items(): array
    {
        if (auth('web')->check()) {
            return $this->itemsFromDatabase();
        }

        return $this->itemsFromSession();
    }

    protected function itemsFromDatabase(): array
    {
        return auth('web')->user()
            ->carts()
            ->with('product')
            ->get()
            ->keyBy(fn($cart) => (int) $cart->product_id)
            ->map(fn($cart) => [
                'id'       => $cart->product_id,
                'name'     => $cart->product->name ?? '',
                'image'    => $cart->product->image_url ?? '',
                'qty'      => $cart->qty,
                'price'    => $cart->price,
                'subtotal' => $cart->qty * $cart->price,
            ])
            ->toArray();
    }

    protected function itemsFromSession(): array
    {
        return collect(session('cart', []))
            ->keyBy(fn($item) => (int) $item['id'])
            ->map(fn($item) => [
                'id'       => $item['id'],
                'name'     => $item['name'],
                'image'    => $item['image'] ?? '',
                'qty'      => $item['qty'],
                'price'    => $item['price'],
                'subtotal' => $item['qty'] * $item['price'],
            ])
            ->toArray();
    }


    public function add(int $productId, int $qty = 1): array
    {
        $product = $this->productModel::findOrFail($productId);

        if (auth('web')->check()) {
            $cart = auth('web')->user()
                ->carts()
                ->where('product_id', $productId)
                ->first();

            if ($cart) {
                $cart->increment('qty', $qty);
            } else {
                auth('web')->user()->carts()->create([
                    'product_id' => $product->id,
                    'qty'        => $qty,
                    'price'      => $product->price,
                ]);
            }
        } else {
            $cart = session('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['qty'] += $qty;
            } else {
                $cart[$productId] = [
                    'id'    => $product->id,
                    'name'  => $product->name,
                    'price' => $product->price,
                    'qty'   => $qty,
                    'image' => $product->image_url,
                ];
            }

            session(['cart' => $cart]);
        }

        // 🔥 RETURN CHO AJAX
        return $this->response();
    }


    public function update(int $productId, string $action): array
    {
        if (auth('web')->check()) {

            $cart = auth('web')->user()
                ->carts()
                ->where('product_id', $productId)
                ->first();

            if (!$cart) {
                return $this->response(false);
            }

            if ($action === 'plus') {
                $cart->increment('qty');
            }

            if ($action === 'minus') {
                if ($cart->qty <= 1) {
                    $cart->delete();
                    return $this->response(true, true);
                }
                $cart->decrement('qty');
            }
        } else {

            $cart = session('cart', []);

            if (!isset($cart[$productId])) {
                return $this->response(false);
            }

            if ($action === 'plus') {
                $cart[$productId]['qty']++;
            }

            if ($action === 'minus') {
                if ($cart[$productId]['qty'] <= 1) {
                    unset($cart[$productId]);
                    session(['cart' => $cart]);
                    return $this->response(true, true);
                }
                $cart[$productId]['qty']--;
            }

            session(['cart' => $cart]);
        }

        $response = $this->response(true);
        $response['new_qty'] = $this->currentQty($productId);
        return $response;
    }

    protected function currentQty(int $productId): int
    {
        $item = collect($this->items())->get($productId);

        return $item['qty'] ?? 0;
    }

    public function remove(int $productId): array
    {
        if (auth('web')->check()) {
            auth('web')->user()
                ->carts()
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = session('cart', []);
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }

        return $this->response(true, true);
    }
    protected function response(bool $changed = true, bool $removed = false): array
    {
        return [
            'status'     => true,
            'changed'    => $changed,
            'removed'    => $removed,
            'cartItems'  => $this->items(),
            'cartCount'  => $this->countItems(),
            'cartTotal'  => $this->totalPrice(),
            'subtotal'   => $this->subtotal(request()->product_id ?? 0),
            'cart_html' => view('layouts.header')->render(),
        ];
    }

    public function countItems(): int
    {
        return count($this->get());
    }

    public function totalPrice(): float
    {
        return collect($this->get())->sum(fn($item) => $item['qty'] * $item['price']);
    }

    public function subtotal(int $productId): float
    {

        if ($productId <= 0) {
            return 0;
        }

        $item = collect($this->items())->get($productId);
        return $item ? $item['qty'] * $item['price'] : 0;
    }
    public function mergeGuestCartToUser(int $userId): void
    {
        $guestCart = session('cart', []);

        if (empty($guestCart)) {
            return;
        }

        foreach ($guestCart as $productId => $item) {
            Carts::updateOrCreate(
                [
                    'account_id' => $userId,
                    'product_id' => $productId,
                ],
                [
                    'qty' => DB::raw('qty + ' . $item['qty']),
                    'price' => $item['price'],
                ]
            );
        }

        // ❌ XÓA cart guest sau khi merge
        session()->forget('cart');
    }
}
