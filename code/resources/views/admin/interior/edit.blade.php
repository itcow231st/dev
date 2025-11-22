@extends('admin.layouts.master')
@section('content')
    <h1>Update Interior</h1>
    <form method="POST" action="{{ route('admin.interior.update') }}">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $interior->id }}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $interior->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection