<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\InteriorService;
use App\Services\ProductService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $interiorService;
    protected $uploadService;
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->interiorService = new InteriorService();
        $this->uploadService = new UploadFileService();
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.product.index')->with('products', $products);
    }

    public function create()
    {
        $interiors = $this->interiorService->getAllInteriors();
        return view('admin.product.create')->with('interiors', $interiors);
    }

    public function store(Request $request)
    {
        try{
            $data = $request->all();
            if($data['image_url']){
                $image = $this->uploadService->upload($request->file('image_url'), 'products');
                $data['image_url'] = $image;
            }
            $this->productService->createProduct($data);
            return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the product.');
        }
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        $interiors = $this->interiorService->getAllInteriors();
        return view('admin.product.edit')->with(['product' => $product, 'interiors' => $interiors]);
    }

    public function update(Request $request)
    {
        try{
            $data = $request->all();
            if(isset($data['image_url'])){
                $image = $this->uploadService->upload($request->file('image_url'), 'products');
                $data['image_url'] = $image;
            }else{
                $data['image_url'] = $data['image_url_old'];
            }
            $id = $data['id'];
            $this->productService->updateProduct($id, $data);
            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the product.');
        }
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $this->productService->destroyProduct($id);
            return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }
}
