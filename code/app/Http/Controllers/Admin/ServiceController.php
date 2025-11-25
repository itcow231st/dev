<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;
    public function __construct()
    {
        $this->serviceService = new ServiceService();
    }

    public function index()
    {
        $services = $this->serviceService->getAllServices();
        return view('admin.service.index')->with('services', $services);
    }
    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
       try {
           $this->serviceService->createService($request->all());
           return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'An error occurred while creating the service: ' . $e->getMessage());
       }
    }

    public function edit($id)
    {
        $service = $this->serviceService->getServiceById($id);
        return view('admin.service.edit')->with('service', $service);
    }

    public function update(Request $request)
    {
        try {
            $this->serviceService->updateService($request->all());
            return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the service: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
           $id = $request->id;
           $this->serviceService->destroyService($id);
           return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting the service: ' . $e->getMessage()]);
        }
    }
}
