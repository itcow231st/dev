@extends('admin.layouts.master')
@section('content')
    <h1>Interior Management</h1>
    <p>Welcome to the Interior Management Dashboard.</p>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <a href="{{ route('admin.interior.create') }}" class="btn btn-primary mb-3">Create New Interior</a>
            <x-admin.data-table id="interiorsTable" table="interiors" 
            :actions="[
                'image' => [
                    'field' => 'image_url',
                    'base' => '/storage/',
                ],
                'edit' => [
                    'route' => 'admin.interior.edit',
                ],
                'delete' => [
                    'route' => 'admin.interior.destroy',
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
