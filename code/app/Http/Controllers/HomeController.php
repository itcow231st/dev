<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('home.index');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function products()
    {
        return view('home.products');
    }

   public function productDetail($slug)
    {
        return view('home.product_details', ['slug' => $slug]);
    }

    public function checkout()
    {
        return view('home.checkout');
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function login()
    {
        return view('home.login');
    }

    public function register()
    {
        return view('home.register');
    }

    public function profile()
    {
        return view('home.profile');
    }
    
}
