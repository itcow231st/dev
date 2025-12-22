@extends('layouts.master')
@section('css')
    <style>
        body {
            background: #f6f6f6;
        }
        .header {
            background: #3377ff;
            color: #fff;
        }
        .profile-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #3377ff;
        }
        .footer {
            background: #fff;
            border-top: 1px solid #ddd;
        }
        .hero-header {
            background: none;
        }
    </style>

@endsection
@section('content')
<!-- BODY -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="profile-card mx-auto" style="max-width: 720px;">
        <div class="text-center mb-4">
            <img src="https://i.pravatar.cc/300" class="avatar" alt="avatar" />
            <h5 class="mt-3 fw-bold">Tên người dùng</h5>
            <p class="text-muted">user@example.com</p>
        </div>

        <form class="row g-3" method="POST" action="{{ route('home.profile.update') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ auth()->user()->profile->id }}">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Họ và tên</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên" name="full_name" value="{{ auth()->user()->profile->full_name }}" />
                @error('full_name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Số điện thoại</label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone_number" value="{{ auth()->user()->profile->phone_number }}" />
                @error('phone_number')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" placeholder="Nhập email" name="email" value="{{ auth()->user()->email }}" />
                @error('email')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            {{-- <div class="col-md-6">
                <label class="form-label fw-semibold">Ngày sinh</label>
                <input type="date" class="form-control" value="{{ auth()->user()->profile->birthday }}" />
            </div> --}}

            <div class="col-12">
                <label class="form-label fw-semibold">Địa chỉ</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{{ auth()->user()->profile->address }}" />
                @error('address')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 text-end mt-3">
                <button class="btn btn-primary px-4" style="background:#3377ff; border:none;">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
@endsection
