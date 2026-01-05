@extends('admin.layouts.master')
@section('content')
    <h1>Update Category</h1>
    <form method="POST" action="{{ route('admin.categories.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $category->id }}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? old('name') }}">
           <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="mb-3">
            <label for="interior_id" class="form-label">Interior</label>
            <select class="form-select" id="interior_id" name="interior_id">
                <option value="">Select Interior</option>
                @foreach ($interiors as $interior)
                    <option value="{{ $interior->id }}" {{ old('interior_id', $category->interior_id) == $interior->id ? 'selected' : '' }}>
                        {{ $interior->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
            <input type="text" class="form-control" name="image_url_old" value="{{$category->image_url}}" hidden>
        </div>  
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection