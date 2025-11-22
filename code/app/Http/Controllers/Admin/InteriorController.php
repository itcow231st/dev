<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interior;
use App\Services\InteriorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class InteriorController extends Controller
{
    protected $model;
    protected $interiorService;
    public function __construct()
    {
        $this->model = new Interior();
        $this->interiorService = new InteriorService();
    }

    public function index()
    {
        $interiors = $this->interiorService->getAllInteriors();
        return view('admin.interior.index')->with('interiors', $interiors);
    }
    public function create()
    {
        return view('admin.interior.create');
    }

    public function store(Request $request)
    {
        try {
            $this->interiorService->createInterior($request->all());
            return redirect()->route('admin.interior.index')->with('success', 'Interior created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create interior');
        }
    }

    public function edit($id)
    {
        $interior = $this->interiorService->getInteriorById($id);
        return view('admin.interior.edit')->with('interior', $interior);
    }
    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $this->interiorService->updateInterior($id, $request->all());
            return redirect()->route('admin.interior.index')->with('success', 'Interior updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update interior');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $this->interiorService->deleteInterior($id);
            return redirect()->route('admin.interior.index')->with('success', 'Interior deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete interior');
        }
    }
}
