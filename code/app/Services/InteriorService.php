<?php

namespace App\Services;

use App\Models\Interior;
use Illuminate\Support\Facades\DB;

class InteriorService
{
    protected $model;
    protected $uploadService;
    public function __construct()
    {
        $this->model = new Interior();
        $this->uploadService = new UploadFileService();
    }

    public function getAllInteriors()
    {
        return $this->model->all();
    }

    public function getInteriorById($id)
    {
        return $this->model->find($id);
    }

    public function createInterior(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->model->create($data);
        });
    }

    public function updateInterior($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $interior = $this->model->findOrFail($id);
            if($interior){
                $interior->update($data);
                $this->uploadService->delete($data['image_url_old']);
            }
            return $interior;
        });
    }
    public function deleteInterior($id)
    {
        return DB::transaction(function () use ($id) {
            $interior = $this->model->findOrFail($id);
            if($interior){
                $this->uploadService->delete($interior->image_url);
                $interior->delete();
            }
            return $interior;
        });
    }
}
