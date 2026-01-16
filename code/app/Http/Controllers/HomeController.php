<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AccountService;
use App\Services\CategoriesService;
use App\Services\InteriorService;
use App\Services\ProductService;
use App\Services\ProfileService;
use App\Services\ServiceService;


class HomeController extends Controller
{
    protected $serviceService;
    protected $interiorService;
    protected $productService;
    protected $accountService;
    protected $profileService;
    protected $categoryService;
    public function __construct()
    {   
        $this->serviceService = new ServiceService();
        $this->interiorService = new InteriorService();
        $this->productService = new ProductService();
        $this->categoryService = new CategoriesService();
        $this->accountService = new AccountService();
        $this->profileService = new ProfileService();
        
    }

    public function index()
    {
        $products = $this->productService->getProductBetsSellers();
        $interiors = $this->interiorService->getAllInteriors();
        $services = $this->serviceService->getAllServices();
        return view('home.index', compact('products', 'interiors', 'services'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function products()
    {
        $products = $this->productService->getAllProducts()->paginate(12);
        return view('home.products', compact('products'));
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

    public function processLogin(AuthRequest $request)
    {
        $data = $request->only('email','password');
        if( auth()->guard('web')->attempt($data))
        {
            return redirect()->route('home.index');
        }else
        {
            return redirect()->back()->with('error', 'Sai thông tin đăng nhập!');
        }
       
    }

    public function register()
    {
        return view('home.register');
    }

    public function registerProcess(RegisterRequest $request)
    {
        
        try {
           $this->accountService->setData($request->all())->createAccount();
           return redirect()->route('home.login')->with('success', 'Account created successfully.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Failed to create account: ');
       }
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('home.index');
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function updateProfile(ProfileRequest $request)
    {
        try {
            $this->profileService->updateProfile($request->all());
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: ');
        }
    }

    public function interior($slug)
    {
        $interiors = $this->interiorService->getInteriorBySlug($slug);
        $products = $interiors->products;
        return redirect()->route('home.products')->with('products',$products);
    }
    public function category($slug)
    {
        $categories = $this->categoryService->getCategoryBySlug($slug);
        $products = $categories->products;
        return view('home.products', compact('products'));
    }
    public function service()
    {
      
        return view('home.service');
    }
    public function serviceItem($slug)
    {
        $services = $this->serviceService->getServiceBySlug($slug);
        return redirect()->route('home.products')->with('products',$services);
    }
    
}
