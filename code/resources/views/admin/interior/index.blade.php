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
                    @foreach ($interiors as $interior)
                        <tr>
                            <td>{{ $interior->id }}</td>
                            <td>{{ $interior->name }}</td>
                            <td>{{ $interior->slug }}</td>
                            <td><a href="{{ route('admin.interior.edit', $interior->id) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form method="POST" action="{{ route('admin.interior.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $interior->id }}">
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
