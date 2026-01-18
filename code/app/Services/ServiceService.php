<?php

namespace App\Services;

use App\Models\Service;
use Exception;
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

    public function getServiceBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    public function createService($data)
    {
        DB::beginTransaction();
        try {
            $service =  $this->model->create($data);
            DB::commit();
            return $service;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateService($data)
    {
        DB::beginTransaction();
        try {
            $service = $this->model->find($data['id']);
            if ($service) {
                $service->update($data);
                if(isset($data['image_url_old'])){
                    $this->uploadService->delete($data['image_url_old']);
                }
            }
            DB::commit();
            return $service;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroyService($id)
    {
       DB::beginTransaction();
        try {
           $service = $this->model->find($id);
            if ($service) {
                if(isset($service->image_url)){
                    $this->uploadService->delete($service->image_url);
                }
                $service->delete();
            }
            DB::commit();
            return $service;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
            
    
    }
}
