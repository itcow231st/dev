@extends('admin.layouts.master')
@section('content')
    <h1>Update Account</h1>
    <form method="POST" action="{{ route('admin.account.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$account->id}}">
        <div class="mb-3">
            <label for="full_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$account->profile?->full_name}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$account->email}}" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number"  value="{{$account->profile?->phone_number}}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"  value="{{$account->profile?->address}}" required>
        </div>
        <div class="mb-3">
        <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role_id" required>
                <option>Role</option>
                @foreach ($roles as $role)
                @if($role->id == $account->role_id)
                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                @else
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
