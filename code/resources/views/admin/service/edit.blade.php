@extends('admin.layouts.master')
@section('content')
    <h1>Update Service</h1>
    <form method="POST" action="{{ route('admin.service.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $service->id }}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $service->name }}">
        </div>
         <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
                <input type="text" class="form-control" name="image_url_old" value="{{$service->image_url}}" hidden>
            </div>  
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection