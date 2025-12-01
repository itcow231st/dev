@extends('admin.layouts.master')
@section('content')
    <h1>Create New Account</h1>
    <form method="POST" action="{{ route('admin.account.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
        <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role_id" required>
                <option>Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
