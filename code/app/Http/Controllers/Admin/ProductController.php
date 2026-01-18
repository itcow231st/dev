<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Products;
use App\Services\CategoriesService;
use App\Services\ProductService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $uploadService;
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->categoryService = new CategoriesService();
        $this->uploadService = new UploadFileService();
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.product.index')->with('products', $products);
    }

//     public function datatable()
// {
//     $products = Products::with('category');

//     return DataTables::of($products)
//         ->addColumn('image', function ($p) {
//             return '<img src="'.config('url.product').$p->image_url.'" width="80">';
//         })
//         ->addColumn('edit', function ($p) {
//             return '<a href="'.route('admin.product.edit',$p->id).'" class="btn btn-warning btn-sm">Edit</a>';
//         })
//         ->addColumn('remove', function ($p) {
//             return '
//             <form method="POST" action="'.route('admin.product.destroy').'">
//                 '.csrf_field().method_field('DELETE').'
//                 <input type="hidden" name="id" value="'.$p->id.'">
//                 <button class="btn btn-danger btn-sm">Delete</button>
//             </form>';
//         })
//         ->rawColumns(['image','edit','remove'])
//         ->make(true);
// }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.product.create')->with('categories', $categories);
    }

    public function store(ProductRequest $request)
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
        $categories = $this->categoryService->getAllCategories();
        return view('admin.product.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    public function update(ProductRequest $request)
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
            return redirect()->route('admin.product.index',['page' => $request->page])->with('success', 'Product updated successfully.');
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
