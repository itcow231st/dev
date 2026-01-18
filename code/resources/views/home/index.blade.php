@extends('layouts.master')
@section('css')
    <style>
        .fixed-image {
            height: 200px;
            /* chỉnh theo ý bạn */
            width: 100%;
            object-fit: cover;
            /* giúp ảnh không méo */
            border-radius: 12px;
        }

        .vesitable-item {
            height: 540px;
            /* chỉnh theo ý bạn */
            overflow: hidden;
        }

        .vesitable-img img {
            height: 280px;
            object-fit: cover;
        }

        /* CARD */
        .vesitable-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* ẢNH CỐ ĐỊNH */
        .vesitable-img {
            height: 220px;
            overflow: hidden;
        }

        .vesitable-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* BODY CHIẾM PHẦN CÒN LẠI */
        .vesitable-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 1rem;
        }

        /* TITLE CỐ ĐỊNH 2 DÒNG */
        .product-title {
            min-height: 48px;
            line-height: 1.4;
            margin-bottom: 8px;

            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        /* MÔ TẢ CỐ ĐỊNH 3 DÒNG */
        .product-desc {
            min-height: 66px;
            line-height: 1.5;
            margin-bottom: 1rem;

            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        /* MÔ TẢ RỖNG */
        .product-desc.empty-desc {
            color: #999;
            font-style: italic;
        }

        /* FOOTER LUÔN Ở ĐÁY */
        .vesitable-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* GIÁ */
        .price {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .category-item {
    height: 100%;
    border-radius: 10px;
    transition: 0.2s;
}

.category-img img {
    height: 200px;
    object-fit: cover;
}

.category-item h5 {
    min-height: 48px; /* đảm bảo text ngắn/dài vẫn đều */
    text-align: center;
}

    </style>
@endsection
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">UY TÍN - CHẤT LƯỢNG</h4>
                    <h1 class="mb-5 display-3 text-primary">TRUNG KIÊN QUẢNG CÁO VÀ NỘI THẤT</h1>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number"
                            placeholder="Search">
                        <button type="submit"
                            class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                            style="top: 0; right: 25%;">Submit Now</button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="https://rubicmarketing.com/wp-content/uploads/2021/09/thiet-ke-banner-quang-cao-noi-that-2.jpg"
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            </div>
                            <div class="carousel-item rounded">
                                <img src="https://haitran.com.vn/wp-content/uploads/2022/10/Bien-quang-cao-3D-ngoai-troi.png"
                                    class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Featurs Section Start -->
    {{-- <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over $300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Featurs Section End -->

    <!-- Featurs Start -->
    {{-- <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Fresh Apples</h5>
                                        <h3 class="mb-0">20% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Tasty Fruits</h5>
                                        <h3 class="mb-0">Free delivery</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="img/featur-3.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h5 class="text-white">Exotic Vegitable</h5>
                                        <h3 class="mb-0">Discount 30$</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Featurs End -->


    <!-- Product Start -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Sản phẩm</h1>
                <p>Khám phá các bộ sưu tập nội thất phong phú, từ cổ điển đến hiện đại, được chọn lọc kỹ lưỡng để mang đến
                    không gian sống hoàn hảo cho bạn.</p>
            </div>
            <div class="row g-4 justify-content-center category-list">
                @foreach ($interiors as $interior)
                    <div class="col-12 col-md-4 d-flex">
                        <a href="{{ route('home.interior.show', $interior->slug) }}"
                            class="category-item text-center d-flex flex-column w-100 p-3">
                            <div class="category-img">
                                <img src="{{ config('url.product') . '/' . $interior->image_url }}"
                                    class="img-fluid w-100 rounded" alt="">
                            </div>
                            <h5 class="mt-3 flex-grow-1 d-flex align-items-center justify-content-center">
                                {{ $interior->name }}
                            </h5>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Product End -->

    <!-- Service Start-->
    <div class="container-fluid">
        <div class="container py-5">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold">Dịch Vụ</h1>
                <a href="#" class="btn btn-light px-4 py-2 rounded-pill shadow-sm fw-semibold hover-pill">
                    Xem thêm
                </a>
            </div>

            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="service-card text-center p-3">
                            <a href="{{ route('home.service.show',$service->slug) }}">
                                <img src="{{ config('url.product') . '/' . $service->image_url }}"
                                    class="service-img rounded" alt="">
                            </a>
                            <div class="py-3">
                                <a href="{{ route('home.service.show',$service->slug) }}" class="service-title">{{ $service->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!--Service End-->


    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-primary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">TRUNG KIÊN</h1>
                        <p class="fw-normal display-3 text-white mb-4">UY TÍN - CHẤT LƯỢNG</p>
                        <p class="mb-4 text-white">Khám phá bộ sưu tập nội thất đa dạng, được thiết kế tinh xảo và sản xuất
                            từ những vật liệu tốt nhất, đáp ứng mọi nhu cầu không gian sống của bạn.</p>
                        <a href="#"
                            class="banner-btn btn border-2 border-white rounded-pill text-white py-3 px-5">BUY</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="https://rubicmarketing.com/wp-content/uploads/2021/09/thiet-ke-banner-quang-cao-noi-that-2.jpg"
                            class="img-fluid w-100 rounded" alt="">
                        {{-- <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                            style="width: 140px; height: 140px; top: 0; left: 0;">
                            <h1 style="font-size: 100px;">1</h1>
                            <div class="d-flex flex-column">
                                <span class="h2 mb-0">50$</span>
                                <span class="h4 text-muted mb-0">kg</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- bestseller Shop Start-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Best Seller</h1>

            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach ($products as $product)
                    <div class="vesitable-item border border-primary rounded vesitable-card">

                        <a href="{{ route('home.product.detail', ['slug' => $product->slug]) }}">
                            <div class="vesitable-img">
                                <img src="{{ config('url.product') . '/' . $product->image_url }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                        </a>

                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">
                            {{ $product->category->name }}
                        </div>

                        <div class="vesitable-body">
                            <h4 class="product-title">
                                <a href="{{ route('home.product.detail', ['slug' => $product->slug]) }}">
                                    {{ $product->name }}
                                </a>
                            </h4>

                            <p class="product-desc {{ empty($product->description) ? 'empty-desc' : '' }}">
                                {{ $product->description ?: 'Đang cập nhật mô tả' }}
                            </p>

                            <div class="vesitable-footer">
                                <p class="price">{{ $product->price }}</p>

                                <button type="button"
                                    class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart"
                                    data-url="{{ route('home.cart.add') }}" data-product-id="{{ $product->id }}"
                                    data-qty="1">
                                    <i class="fa fa-shopping-bag me-2"></i> Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- bestseller Shop End -->



    <!-- Fact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>satisfied customers</h4>
                            <h1>1963</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality of service</h4>
                            <h1>99%</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality certificates</h4>
                            <h1>33</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>Available Products</h4>
                            <h1>789</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->


    <!-- Tastimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Our Testimonial</h4>
                <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Client Name</h4>
                                <p class="m-0 pb-3">Profession</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Client Name</h4>
                                <p class="m-0 pb-3">Profession</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Client Name</h4>
                                <p class="m-0 pb-3">Profession</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tastimonial End -->
@endsection
