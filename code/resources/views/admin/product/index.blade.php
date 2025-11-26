@extends('admin.layouts.master')
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
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>IMG</th>
                        <th>Slug</th>
                        <th>Interior</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>IMG</th>
                        <th>Slug</th>
                        <th>Interior</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img src="{{config('url.product') . $product->image_url }}" width="100"></td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->interior->name }}</td>
                            <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form method="POST" action="{{ route('admin.product.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
