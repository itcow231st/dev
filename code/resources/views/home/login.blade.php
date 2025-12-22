<!-- login.html -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - MyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --main: #3377ff;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        .bg-main {
            background: var(--main) !important;
        }

        .card-login {
            width: 380px;
            border-radius: 8px;
        }

        .header {
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="w-100 header py-4">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('home.index') }}" class="text-decoration-none">
                    <h1 class="text-primary fw-bold display-6">TRUNG KIÊN</h1>
                </a>
            </div>
            <a href="#" class="text-primary">Bạn cần giúp đỡ?</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="container-fluid bg-main d-flex align-items-center justify-content-center"
        style="min-height:60vh; animation:fadeIn 0.8s;">
        <div class="row justify-content-center align-items-center w-100">

            <!-- LEFT - Logo & Text (hidden on small screens) -->
            <div
                class="col-lg-6 text-center text-white d-none d-lg-flex flex-column align-items-center justify-content-center">
                <h1 class="text-light display-2 display-lg-1 fw-bold">TRUNG KIÊN</h1>
                <p class="fs-5">Nền tảng thương mại điện tử hiện đại</p>
            </div>

            <!-- RIGHT - Form centered vertically -->
            <div class="col-lg-4 d-flex justify-content-center">
                <div class="card card-login p-4 shadow-sm" style="animation:slideDown 0.7s;">
                    <h4 class="fw-bold mb-3 text-center">Đăng nhập</h4>
                    @if (session('error'))
                        <small class="text-danger">{{ session('error') }}</small>
                    @endif
                    <form action="{{route('home.processLogin')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="email" placeholder="Email" />
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input class="form-control" type="password" name="password" placeholder="Mật khẩu" />
                             @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">Đăng nhập</button>
                    </form>

                    <div class="text-center mt-3 text-muted">hoặc</div>
                    <div class="d-flex gap-2 mt-2">
                        <button class="btn btn-outline-primary w-50">Facebook</button>
                        <button class="btn btn-outline-danger w-50">Google</button>
                    </div>

                    <div class="text-center mt-3">
                        Bạn mới tham gia? <a href="{{ route('home.register') }}">Đăng ký</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="container py-5">
        <div class="row text-muted">
            <div class="col-md-3">
                <h6 class="fw-bold">DỊCH VỤ KHÁCH HÀNG</h6>
                <ul class="list-unstyled small">
                    <li>Trung Tâm Trợ Giúp</li>
                    <li>Blog</li>
                    <li>MyShop Mall</li>
                    <li>Hướng Dẫn Mua Hàng</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold">VỀ CHÚNG TÔI</h6>
                <ul class="list-unstyled small">
                    <li>Tuyển Dụng</li>
                    <li>Điều Khoản</li>
                    <li>Chính Sách Bảo Mật</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold">THEO DÕI CHÚNG TÔI</h6>
                <ul class="list-unstyled small">
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>LinkedIn</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold">TẢI ỨNG DỤNG</h6>
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/QR_code_example.svg" height="100"
                    alt="qr" />
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
