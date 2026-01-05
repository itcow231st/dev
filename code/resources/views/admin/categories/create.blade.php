@extends('admin.layouts.master')
@section('content')
    <h1>Create New Category</h1>
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            <small class="text-danger">@error('name') {{ $message }} @enderror</small>
        </div>
        <div class="mb-3">
            <label for="interior_id" class="form-label">Interior</label>
            <select class="form-select" id="interior_id" name="interior_id">
                <option value=" ">Interiors</option>
                @foreach ($interiors as $interior)
                    <option value="{{ $interior->id }}" {{ old('interior_id') == $interior->id ? 'selected' : '' }}>
                        {{ $interior->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">@error('interior_id') {{ $message }} @enderror</small>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
