<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceService
{
    protected $model;
    public function __construct()
    {
        $this->model = new Service();
    }

    public function getAllServices()
    {
        return $this->model->all();
    }

    public function getServiceById($id)
    {
        return $this->model->find($id);
    }

    public function createService($data)
    {
        return DB::transaction(function () use ($data) {
            return $this->model->create([
                'name' => $data['name'],
            ]);
           
        });
    }
}