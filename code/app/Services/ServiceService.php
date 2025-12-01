<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceService
{
    protected $model;
    protected $uploadService;
    public function __construct()
    {
        $this->model = new Service();
        $this->uploadService = new UploadFileService();
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
            return $this->model->create($data);
           
        });
    }

    public function updateService($data)
    {
        return DB::transaction(function () use ($data) {
            $service = $this->model->find($data['id']);
            if ($service) {
                $service->update($data);
                $this->uploadService->delete($data['image_url_old']);
            }
            return $service;
        });
    }

    public function destroyService($id)
    {
        return DB::transaction(function () use ($id) {
            $service = $this->model->find($id);
            if ($service) {
                $this->uploadService->delete($service->image_url);
                $service->delete();
            }
            return $service;
        });
    }
}