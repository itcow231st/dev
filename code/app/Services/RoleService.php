<?php

namespace App\Services;

use App\Models\Roles;
use Illuminate\Support\Facades\DB;

class RoleService
{
    protected $model;
    public function __construct()
    {
        $this->model = new Roles();
    }

    public function getAllRoles()
    {
        return $this->model->all();
    }

    public function getRoleById($id)
    {
        return $this->model->find($id);
    }

    public function createRole($data)
    {
        DB::beginTransaction();
        {
            $role = $this->model->create($data);
            DB::commit();
            return $role;
        }
    }

    public function updateRole($data)
    {
        DB::beginTransaction();
        {
            $role = $this->model->find($data['id']);
            if ($role) {
                $role->update($data);
                DB::commit();
                return $role;
            }
            throw new \Exception("Role not found");
        }
    }

    public function deleteRole($id)
    {
        DB::beginTransaction();
        {
            $role = $this->model->find($id);
            if ($role) {
                $role->delete();
                DB::commit();
                return $role;
            }
            throw new \Exception("Role not found");
        }
    }
}