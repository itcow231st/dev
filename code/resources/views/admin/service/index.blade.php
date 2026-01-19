@extends('admin.layouts.master')
@section('content')
    <h1>Service Management</h1>
    <p>Welcome to the service Management Dashboard.</p>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <a href="{{ route('admin.service.create') }}" class="btn btn-primary mb-3">Create New Service</a>
            <x-admin.data-table id="serviceTable" table="services" 
            :actions="[
                'image' => [
                    'field' => 'image_url',
                    'base' => '/storage/',
                ],
                'edit' => [
                    'route' => 'admin.service.edit',
                ],
                'delete' => [
                    'route' => 'admin.service.destroy',
                ],
            ]" :columns="[
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'name', 'title' => 'Name'],
                ['data' => 'image', 'title' => 'IMG'],
                ['data' => 'edit', 'title' => 'Edit'],
                ['data' => 'delete', 'title' => 'Delete'],
            ]" />
        </div>
    </div>
@endsection
