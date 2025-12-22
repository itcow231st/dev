<?php

namespace App\Services;

use App\Models\Profiles;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    protected $model;
    public function __construct()
    {
        $this->model = new Profiles();
    }

    public function updateProfile($data)
    {
        try {
            DB::beginTransaction();

            $profile = $this->model->updateOrCreate(
                ['id' => $data['id'] ?? null],
                $data
            );

            DB::commit();
            return $profile;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new \Exception('Failed to update profile: ' . $e->getMessage());
        }
    }
}
