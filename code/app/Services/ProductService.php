<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Products();
    }

    public function getAllProducts()
    {
       return $this->model->with('interior')->get();
    }

    public function getProductById($id)
    {
        return $this->model->find($id);
    }

    public function createProduct(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->model->create($data);
        });
    }

    public function updateProduct($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $product = $this->model->find($id);
            if ($product) {
                $product->update($data);
            }
            return $product;
        });
    }

    public function destroyProduct($id)
    {
        return DB::transaction(function () use ($id) {
            $product = $this->model->find($id);
            if ($product) {
                $product->delete();
            }
            return $product;
        });
    }
}