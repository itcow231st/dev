<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'nullable|integer|min:1'
        ]);

        $carts = $this->cartService->add(
            $data['product_id'],
            $data['qty'] ?? 1
        );
        
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm vào giỏ hàng',
            'cart_html' => view('layouts.header')->render(),
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $cart = session('cart', []);

        unset($cart[$request->product_id]);

        session(['cart' => $cart]);
         $cart_total = collect($cart)->sum(fn($i) => $i['qty'] * $i['price']);
        return response()->json([
            'status' => true,
            'cart_count' => count($cart),
            'cart_total' => $cart_total,
            'cart_html' => view('layouts.header')->render(),
        ]);
    }
}
