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
            <table id="productsTable" class="display cell-border stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>IMG</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $.fn.dataTable.ext.pager.numbers_length = 15;
$(function () {
    $('#productsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.product.datatable') }}",

        pagingType: 'full_numbers',

        columns: [
            { data: 'id' },
            { data: 'name' },
            {
                data: 'description',
                className: 'col-description'
            },
            { data: 'price' },
            { data: 'image', orderable: false, searchable: false },
            { data: 'slug' },
            { data: 'category.name', name: 'category.name' },
            { data: 'edit', orderable: false, searchable: false },
            { data: 'remove', orderable: false, searchable: false }
        ],

        autoWidth: false
    });
});
</script>
@endsection

