<?php

namespace App\Services;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class CategoriesService
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Categories();
    }

    public function getAllCategories()
    {
        $categories = $this->categoryModel->with('interior')->get();
        return $categories;
    }

    public function getCategoryBySlug($slug)
    {
        return $this->categoryModel->where('slug', $slug)->first();
    }

    public function createCategory($data)
    {
       DB::beginTransaction();

        try {
            $category = $this->categoryModel->create($data);
            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getCategoryById($id)
    {
        return $this->categoryModel->find($id);
    }

    public function updateCategory($id, $data)
    {
        DB::beginTransaction();

        try {
            $category = $this->categoryModel->find($id);
            if ($category) {
                $category->update($data);
            }
            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function deleteCategory($id)
    {
        DB::beginTransaction();

        try {
            $category = $this->categoryModel->find($id);
            if ($category) {
                $category->delete();
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}