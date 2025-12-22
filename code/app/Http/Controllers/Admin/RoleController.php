<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct()
    {
        $this->roleService = new RoleService();
    }
    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('admin.role.index')->with('roles', $roles);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(RoleRequest $request)
    {
        try{
          $this->roleService->createRole($request->all());  
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create role: ' . $e->getMessage()]);
        }
        return redirect()->route('admin.role.index');
    }

    public function edit($id)
    {
        $role = $this->roleService->getRoleById($id);
        return view('admin.role.edit')->with('role', $role);
    }

    public function update(RoleRequest $request)
    {
        try{
          $this->roleService->updateRole($request->all());  
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update role: ' . $e->getMessage()]);
        }
        return redirect()->route('admin.role.index');
    }

    public function destroy(Request $request)
    {
        try{
          $this->roleService->deleteRole($request->id);  
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete role: ' . $e->getMessage()]);
        }
        return redirect()->route('admin.role.index');
    }
}
