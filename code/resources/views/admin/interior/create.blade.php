@extends('admin.layouts.master')
@section('content')
    <h1>Create New Interior</h1>
    <form method="POST" action="{{ route('admin.interior.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection