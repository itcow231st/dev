<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Services\CategoriesService;
use App\Services\InteriorService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryService;
    private $interiorService;
    public function __construct()
    {
        $this->categoryService = new CategoriesService();
        $this->interiorService = new InteriorService();
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
        $data = $request->only(['name', 'image_url', 'interior_id']);
        $this->categoryService->createCategory($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        $interiors = $this->interiorService->getAllInteriors();
        return view('admin.categories.edit', compact('category', 'interiors'));
    }

    public function update(CategoriesRequest $request)
    {
        $data = $request->only(['name', 'image_url', 'interior_id']);
        $id = $request->input('id');
        $this->categoryService->updateCategory($id, $data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
