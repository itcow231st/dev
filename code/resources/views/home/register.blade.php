<!-- register.html -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - MyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> :root{ --main: #3377ff; } body{ margin:0; } .bg-main{ background:var(--main) !important; } .card-register{ width:420px; border-radius:8px; } </style>
</head>
<body>

<div class="w-100 header py-4" style="background:#fff; box-shadow:0 2px 6px rgba(0,0,0,0.06);">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
           
            <a href="{{route('home.index')}}"  class="text-decoration-none">
                 <h1 class="text-primary fw-bold display-6">TRUNG KIÊN</h1>
            </a>
        </div>
        <a href="#" class="text-primary">Bạn cần giúp đỡ?</a>
    </div>
</div>

<div class="container-fluid bg-main d-flex align-items-center justify-content-center" style="min-height:60vh;">
    <div class="row w-100 justify-content-center align-items-center">
        <div class="col-lg-6 text-center text-white d-none d-lg-flex flex-column align-items-center justify-content-center">
             <h1 class="text-light display-2 display-lg-1 fw-bold">TRUNG KIÊN</h1>
            <p class="fs-5">Tạo tài khoản để bắt đầu mua sắm</p>
        </div>
        <div class="col-lg-4 d-flex justify-content-center">
            <div class="card card-register p-4 shadow-sm">
                <h4 class="fw-bold mb-3 text-center">Đăng ký</h4>
                <form action="{{ route('home.registerProcess') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input class="form-control" name="full_name" placeholder="Họ và tên" value="{{old('full_name')}}">
                        @error('full_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input class="form-control" name="password" type="password" placeholder="Mật khẩu" >
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Xác nhận mật khẩu</label>
                        <input class="form-control" name="password_confirmation" type="password" placeholder="Xác nhận mật khẩu" >
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Đăng ký</button>
                </form>
                <div class="text-center mt-3">Đã có tài khoản? <a href="{{route('home.login')}}">Đăng nhập</a></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
