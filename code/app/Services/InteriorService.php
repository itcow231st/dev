<?php

namespace App\Services;

use App\Models\Interior;
use Illuminate\Support\Facades\DB;

class InteriorService
{
    protected $model;
    public function __construct()
    {
        $this->model = new Interior();
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
            $interior->update($data);
            return $interior;
        });
    }
    public function deleteInterior($id)
    {
        return DB::transaction(function () use ($id) {
            $interior = $this->model->findOrFail($id);
            return $interior->delete();
        });
    }
}
