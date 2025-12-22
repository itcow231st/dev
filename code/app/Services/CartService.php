<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\Products;

class CartService
{
    protected string $key = 'cart';
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new Products();
    }

    public function get(): array
    {
        return Session::get($this->key, []);
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

    public function count(): int
    {
        return collect($this->get())->sum('qty');
    }

    public function remove(int $productId): void
    {
        $cart = $this->get();
        unset($cart[$productId]);
        Session::put($this->key, $cart);
    }

    public function clear(): void
    {
        Session::forget($this->key);
    }
}