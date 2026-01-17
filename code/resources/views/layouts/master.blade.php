<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <style>
        .marquee {
            display: flex;
            white-space: nowrap;
            animation: marquee 10s linear infinite;
        }

        .marquee span {
            color: white;
            font-size: 14px;
            padding-right: 40px;
            /* khoảng cách giữa 2 đoạn */
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }


        /* ============= DESKTOP INPUT (always visible) ============= */
        @media (min-width: 992px) {
            #searchInputDesktop {
                width: 250px;
                border-radius: 10px;
                transition: 0.25s ease;
            }
        }

        /* ============= MOBILE DROPDOWN INPUT ============= */
        .search-dropdown {
            position: absolute;
            top: 50px;
            left: 0;
            width: calc(100vw - 20px);
            margin-left: -10px;
            background: #fff;
            padding: 12px;
            border-radius: 12px;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
            display: none;
            z-index: 9999;
        }

        .search-dropdown.active {
            display: block;
        }

        /* ============= ẨN / HIỆN INPUT TUỲ THEO MÀN HÌNH ============= */

        /* Mobile: Ẩn Desktop input */
        @media (max-width: 991px) {
            #searchInputDesktop {
                display: none !important;
            }
        }

        /* Desktop: Ẩn Mobile dropdown */
        @media (min-width: 992px) {
            #searchDropdown {
                display: none !important;
            }
        }

        /* Container */
        .category-list .category-item {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease;
            text-decoration: none;
        }

        /* Hover effect */
        .category-list .category-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        /* Image circle */
        .category-list .category-img {
            width: 130px;
            height: 130px;
            margin: auto;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .category-list .category-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.35s ease;
        }

        /* Zoom ảnh khi hover */
        .category-list .category-item:hover img {
            transform: scale(1.08);
        }

        /* Text */
        .category-list h5 {
            color: #333;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Card effect */
.service-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* Image effect */
.service-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: 0.3s ease;
}

.service-card:hover .service-img {
    transform: scale(1.05);
}

/* Title style */
.service-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #222;
    text-decoration: none;
    transition: color 0.3s ease;
}

.service-title:hover {
    color: #0d6efd;
}

/* Button "Xem thêm" */
.hover-pill {
    transition: 0.3s ease;
}

.hover-pill:hover {
    background: #e9ecef;
    transform: translateY(-2px);
}
.user-fb {
    padding: 6px 10px;
    border-radius: 20px;
    transition: background 0.2s;
}

.user-fb:hover {
    background: #f0f2f5;
}
.remove-cart-item {
    background: none;
    border: none;
    color: #dc3545;
    font-size: 16px;
    cursor: pointer;
    margin-left: 8px;
}

.remove-cart-item:hover {
    color: #a71d2a;
}

/* Mega menu */
.mega-dropdown .dropdown-menu {
    top: 100%;
    left: 0;
}

.mega-menu {
    background: #ffffff;
}

/* Tiêu đề cột */
.mega-title {
    color: #0d6efd;
    font-weight: 700;
    margin-bottom: 10px;
}

/* Link trong mega menu */
.mega-link {
    display: block;
    color: #666;
    font-size: 15px;
    padding: 4px 0;
    text-decoration: none;
}

.dropdown .dropdown-menu a:hover {
    color: #0d6efd;
    background: #e9ecef;
   
}

/* Hover mở menu (giống ảnh – không cần click) */
@media (min-width: 992px) {
    .mega-dropdown:hover .dropdown-menu {
        display: block;
    }
}


    </style>
    @yield('css')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    @include('layouts.header')
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    @yield('content')

    @include('layouts.footer')



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnSearch = document.getElementById("btnSearch");
            const dropdown = document.getElementById("searchDropdown");
            const inputMobile = document.getElementById("searchInputMobile");
            const form = document.getElementById("searchForm");

            let mobileOpen = false;

            btnSearch.addEventListener("click", function() {

                // DESKTOP → Submit form
                if (window.innerWidth >= 992) {
                    form.submit();
                    return;
                }

                // MOBILE
                if (!mobileOpen) {
                    // Lần 1 → mở
                    dropdown.classList.add("active");
                    inputMobile.focus();
                    mobileOpen = true;
                } else {
                    // Lần 2 → đóng, KHÔNG submit
                    dropdown.classList.remove("active");
                    mobileOpen = false;
                }
            });

            // Bấm ra ngoài để đóng dropdown trên mobile
            document.addEventListener("click", function(e) {
                if (window.innerWidth >= 992) return;

                if (!dropdown.contains(e.target) &&
                    !btnSearch.contains(e.target)) {

                    dropdown.classList.remove("active");
                    mobileOpen = false;
                }
            });
        });
    </script>

</body>

</html>
