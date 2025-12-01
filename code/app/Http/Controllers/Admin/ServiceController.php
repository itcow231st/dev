<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ServiceService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;
    protected $uploadService;
    public function __construct()
    {
        $this->serviceService = new ServiceService();
        $this->uploadService = new UploadFileService();
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
         $data = $request->all();
            if($data['image_url']){
                $image = $this->uploadService->upload($request->file('image_url'), 'services');
                $data['image_url'] = $image;
            }
           $this->serviceService->createService($data);
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
             $data = $request->all();
            if(isset($data['image_url'])){
                $image = $this->uploadService->upload($request->file('image_url'), 'services');
                $data['image_url'] = $image;
            }else{
                $data['image_url'] = $data['image_url_old'];
            }
            $this->serviceService->updateService($data);
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
