@extends('admin.layouts.master')
@section('content')
    <h1>Role Management</h1>
    <p>Welcome to the role Management Dashboard.</p>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary mb-3">Create New Role</a>
            <x-admin.data-table id="roleTable" table="roles" 
            :actions="[
                'edit' => [
                    'route' => 'admin.role.edit',
                ],
                'delete' => [
                    'route' => 'admin.role.destroy',
                ],
            ]" :columns="[
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'name', 'title' => 'Name'],
                ['data' => 'edit', 'title' => 'Edit'],
                ['data' => 'delete', 'title' => 'Delete'],
            ]" />
        </div>
    </div>
@endsection
