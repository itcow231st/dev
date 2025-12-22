<?php

namespace App\Services;

use App\Models\Interior;
use Exception;
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

    public function getInteriorBySlug($slug)
    {
        return $this->model->find($slug);
    }

    public function createInterior(array $data)
    {
        DB::beginTransaction();
        try{
            $interios = $this->model->create($data);
            DB::commit();
            return $interios;
        }catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateInterior($id, array $data)
    {
        DB::beginTransaction();
        try{
            $interior = $this->model->findOrFail($id);
            if($interior){
                $interior->update($data);
                $this->uploadService->delete($data['image_url_old']);
            }
            DB::commit();
            return $interior;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
    public function deleteInterior($id)
    {
        DB::beginTransaction();
        try{
              $interior = $this->model->findOrFail($id);
            if($interior){
                $this->uploadService->delete($interior->image_url);
                $interior->delete();
            }
            DB::commit();
            return $interior;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}
