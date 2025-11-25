<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.product.index')->with('products', $products);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        try{
            $this->productService->createProduct($request->all());
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the product.');
        }
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('admin.product.edit')->with('product', $product);
    }

    public function update(Request $request)
    {
        try{
            $id = $request->id;
            $this->productService->updateProduct($id, $request->all());
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the product.');
        }
    }

    public function destroy($id)
    {
        try{
            $this->productService->destroyProduct($id);
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }
}
