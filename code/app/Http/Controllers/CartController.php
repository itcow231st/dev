<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $this->cartService->add(
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

        $cart = $this->cartService->remove($request->input('product_id'));
        $cart_total = collect($cart)->sum(fn($i) => $i['qty'] * $i['price']);
        return response()->json([
            'status' => true,
            'cart_count' => count($cart),
            'cart_total' => $cart_total,
            'cart_html' => view('layouts.header')->render(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer',
            'action' => 'required|in:plus,minus'
        ]);

        $cart = $this->cartService->update(
            $data['product_id'],
            $data['action']
        );

        if (isset($cart['removed']) && $cart['removed'] === true) {
            return response()->json([
                'status' => true,
                'removed' => true,
                'cart_count' => $cart['cart_count'],
                'cart_total' => $cart['cart_total'],
            ]);
        }
        return response()->json([
            'status' => true,
            'cart_count' => $cart['cart_count'],
            'cart_total' => $cart['cart_total'],
            'new_qty' => $cart['new_qty'],
            'subtotal' => $cart['subtotal'],
            'cart_html' => view('layouts.header')->render(),
        ]);
    }

    
}
