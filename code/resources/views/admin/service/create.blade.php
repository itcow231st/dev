@extends('admin.layouts.master')
@section('content')
    <h1>Create New Service</h1>
    <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
         <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="file" class="form-control" id="image_url" name="image_url" >
            </div>  
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection