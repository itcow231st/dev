@extends('admin.layouts.master')
@section('content')
    <h1>Update Role</h1>
    <form method="POST" action="{{ route('admin.role.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $role->id }}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $role->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection