<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Services\CategoriesService;
use App\Services\InteriorService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryService;
    private $interiorService;
    private $uploadService;
    public function __construct()
    {
        $this->categoryService = new CategoriesService();
        $this->interiorService = new InteriorService();
        $this->uploadService = new UploadFileService();
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $interiors = $this->interiorService->getAllInteriors();
        return view('admin.categories.create', compact('interiors'));
    }

    public function store(CategoriesRequest $request)
    {
        try {
            $data = $request->only(['name', 'image_url', 'interior_id']);
            if ($data['image_url']) {
                $image = $this->uploadService->upload($request->file('image_url'), 'categories');
                $data['image_url'] = $image;
            }
            $this->categoryService->createCategory($data);
            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the category.');
        }
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        $interiors = $this->interiorService->getAllInteriors();
        return view('admin.categories.edit', compact('category', 'interiors'));
    }

    public function update(CategoriesRequest $request)
    {
        try {
            $data = $request->only(['name', 'image_url', 'interior_id']);
            if ($data['image_url']) {
                $image = $this->uploadService->upload($request->file('image_url'), 'categories');
                $data['image_url'] = $image;
            } 
            $id = $request->input('id');
            $this->categoryService->updateCategory($id, $data);
            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while uploading the image.');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $this->categoryService->deleteCategory($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
