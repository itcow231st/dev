@extends('admin.layouts.master')
@section('content')
     <h1>Create New Product</h1>
    <form method="POST" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{$product->name}}">
        </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea> 
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
                <input type="text" class="form-control" name="image_url_old" value="{{$product->image_url}}" hidden>
            </div>  
            <div class="mb-3">
                <label for="interior_id" class="form-label">Interior</label>
                <select class="form-select" id="interior_id" name="interior_id" required>
                    <option value="">Select Interior</option>
                    @foreach($interiors as $interior)
                        @if($interior->id == $product->interior_id)
                            <option value="{{ $interior->id }}" selected>{{ $interior->name }}</option>
                        @else
                        <option value="{{ $interior->id }}">{{ $interior->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection