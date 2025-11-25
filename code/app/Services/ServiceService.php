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

    public function updateService($data)
    {
        return DB::transaction(function () use ($data) {
            $service = $this->model->find($data['id']);
            if ($service) {
                $service->name = $data['name'];
                $service->save();
            }
            return $service;
        });
    }

    public function destroyService($id)
    {
        return DB::transaction(function () use ($id) {
            $service = $this->model->find($id);
            if ($service) {
                $service->delete();
            }
            return $service;
        });
    }
}