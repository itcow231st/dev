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

    public function add(Request $request, CartService $cartService)
    {
        return response()->json(
            $cartService->add($request->product_id, $request->qty ?? 1)
        );
    }

    public function update(Request $request, CartService $cartService)
    {
        return response()->json(
            $cartService->update($request->product_id, $request->action)
        );
    }

    public function remove(Request $request, CartService $cartService)
    {
        return response()->json(
            $cartService->remove($request->product_id)
        );
    }
}
