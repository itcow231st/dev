@extends('admin.layouts.master')
@section('content')
    <h1>Update Service</h1>
    <form method="POST" action="{{ route('admin.service.update') }}">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $service->id }}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $service->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection