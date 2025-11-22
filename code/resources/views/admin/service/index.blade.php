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
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->slug }}</td>
                            <td><a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form method="POST" action="{{ route('admin.service.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $service->id }}">
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
