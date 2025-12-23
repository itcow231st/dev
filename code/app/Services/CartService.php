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
        // User đã login → lấy từ DB
        if (Auth::guard('web')->check()) {
            return Auth::user()
                ->cartItems
                ->keyBy('product_id')
                ->map(fn ($item) => [
                    'id'    => $item->product_id,
                    'name'  => $item->product->name,
                    'qty'   => $item->qty,
                    'price' => $item->price,
                    'total' => $item->qty * $item->price,
                ])
                ->toArray();
        }

        // Guest → lấy session
        return session('cart', []);
    }

    public function add(int $productId, int $qty = 1): array
    {
        $cart = $this->get();

        $product = $this->productModel::findOrFail($productId);

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

        Session::put($this->key, $cart);

        return $cart;
    }

    public function update(int $productId, string $action)
    {
        $cart = $this->get();
        if (isset($cart[$productId])) {
            if ($action === 'plus') {
                $cart[$productId]['qty']++;
            } elseif ($action === 'minus' && $cart[$productId]['qty'] > 1) {
                $cart[$productId]['qty']--;
            }elseif($action === 'minus' && $cart[$productId]['qty'] == 1){
                unset($cart[$productId]);
                Session::put($this->key, $cart);
                return [
                    'removed' => true,
                    'cart_count' => $this->countItems(),
                    'cart_total' => $this->totalPrice(),
                ];
            }
            Session::put($this->key, $cart);
        }
        return [
            'removed' => false,
            'cart' => $cart,
            'new_qty' => $cart[$productId]['qty'] ?? 0,
            'subtotal' => $cart[$productId]['qty'] * $cart[$productId]['price'] ?? 0,
            'cart_total' => $this->totalPrice(),
            'cart_count' => $this->countItems(),
        ];
    }

    public function remove(int $productId)
    {
        $cart = $this->get();
        unset($cart[$productId]);
        Session::put($this->key, $cart);
        return $cart;
    }

    public function clear(): void
    {
        Session::forget($this->key);
    }

    public function countItems(): int
    {
        return count($this->get());
    }

    public function totalPrice(): float
    {
        return collect($this->get())->sum(fn($item) => $item['qty'] * $item['price']);
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