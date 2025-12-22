<?php

namespace App\Services;

use App\Models\Roles;
use Exception;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr;

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
        try{
            $role = $this->model->create($data);
            DB::commit();
            return $role;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function updateRole($data)
    {
        DB::beginTransaction();
        try{
            $role = $this->model->find($data['id']);
            if ($role) {
                $role->update($data);
            }
            DB::commit();
            return $role;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteRole($id)
    {
        DB::beginTransaction();
        try{
            $role = $this->model->find($id);
            if ($role) {
                $role->delete();
            }
            DB::commit();
            return $role;
        }catch(Exception $e){
                DB::rollBack();
                throw $e;
            }
    }
}