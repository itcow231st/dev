<?php

namespace App\Http\Controllers;

use App\Services\InteriorService;
use App\Services\ProductService;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $serviceService;
    protected $interiorService;
    protected $productService;
    public function __construct()
    {   
        $this->serviceService = new ServiceService();
        $this->interiorService = new InteriorService();
        $this->productService = new ProductService();
        
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

    public function interior($slug)
    {
        $interiors = $this->interiorService->getInteriorBySlug($slug);
        $products = $interiors->products;
        return redirect()->route('home.products')->with('products',$products);
    }
    public function service()
    {
        $services = $this->serviceService->getAllServices();
      
        return redirect()->route('home.products')->with('products',$services);
    }
    public function serviceItem($slug)
    {
        $services = $this->serviceService->getServiceBySlug($slug);
        return redirect()->route('home.products')->with('products',$services);
    }
    
}
