@extends('admin.layouts.master')
@section('content')
    <h1>Update Role</h1>
    <form method="POST" action="{{ route('admin.role.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $role->id }}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger mt-2">{{ $error }} </p>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection