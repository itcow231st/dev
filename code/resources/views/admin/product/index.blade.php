@extends('admin.layouts.master')
@section('css')
<style>
.col-description {
    max-width: 350px;
    white-space: normal;
    word-break: break-word;
}
</style>
@endsection
@section('content')
    <h1>Products Management</h1>
    <p>Welcome to the service Management Dashboard.</p>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Create New Service</a>
            <x-admin.data-table id="productsTable" table="products" 
            :actions="[
                'image' => [
                    'field' => 'image_url',
                    'base' => '/storage/',
                ],
                'edit' => [
                    'route' => 'admin.product.edit',
                ],
                'delete' => [
                    'route' => 'admin.product.destroy',
                ],
            ]" :columns="[
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'name', 'title' => 'Name'],
                ['data' => 'image', 'title' => 'IMG'],
                ['data' => 'category.name', 'title' => 'Category'],
                ['data' => 'edit', 'title' => 'Edit'],
                ['data' => 'delete', 'title' => 'Delete'],
            ]" />

        </div>
    </div>
@endsection
