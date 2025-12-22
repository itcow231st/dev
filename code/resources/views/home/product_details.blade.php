@extends('layouts.master')
@section('css')
    <style>
       
        /* Thumbnail */
        .product-thumb-vertical {
            height: 80px;
            width: 100%;
            object-fit: cover;
            cursor: pointer;
            transition: .25s;
            border: 2px solid transparent;
        }

        .product-thumb-vertical:hover {
            border-color: #0d6efd;
            transform: scale(1.05);
        }
      /* Cột thumbnail không bao giờ thay đổi width */
.product-thumbs-col {
    width: 90px;
    flex-shrink: 0;
}

/* Khung chứa ảnh lớn */
.product-main-wrap {
    height: 500px; /* chỉnh chiều cao tuỳ ý */
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f8f9fa; /* giúp nhìn dễ hơn */
    overflow: hidden;
}

/* Ảnh lớn full chiều cao div nhưng KHÔNG bị crop */
.product-main-img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;  /* giữ nguyên tỉ lệ, không crop */
    object-position: center;
}

    </style>
@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="d-flex gap-3 border rounded p-3 shadow-sm">

                            <!-- Cột ảnh nhỏ -->
                            <div class="d-flex flex-column gap-2 product-thumbs-col">

                                <!-- Ảnh chính -->
                                <img src="https://noithatdogoviet.com/upload/sanpham/large/tu-de-quan-ao-mdf-cua-truot-hien-dai-mau-nau-dam-dep-gia-re.jpg" class="img-fluid product-thumb-vertical rounded"
                                    onclick="changeImage(this)">

                                <!-- Ảnh random -->
                                @for ($i = 1; $i <= 3; $i++)
                                    <img src="/img/fruite-item-{{ rand(1, 5) }}.jpg"
                                        class="img-fluid product-thumb-vertical rounded" onclick="changeImage(this)">
                                @endfor

                            </div>

                            <!-- Ảnh lớn -->
                            <div class="flex-grow-1">
                                <img id="mainImage" src="https://noithatdogoviet.com/upload/sanpham/large/tu-de-quan-ao-mdf-cua-truot-hien-dai-mau-nau-dam-dep-gia-re.jpg"
                                    class="img-fluid w-100 product-main-img rounded" alt="">
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">Brocoli</h4>
                        <p class="mb-3">Category: Vegetables</p>
                        <h5 class="fw-bold mb-3">3,35 $</h5>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected
                            humour, or non-characteristic words etc.</p>
                        <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain
                            pickerel hatchetfish, pencilfish snailfish</p>
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or
                                    non-characteristic words etc.
                                    Susp endisse ultricies nisi vel quam suscipit </p>
                                <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish
                                    Antarctic
                                    icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray
                                    sweeper.</p>
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div
                                                class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">1 kg</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Country of Origin</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Agro Farm</p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Quality</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Organic</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Сheck</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Healthy</p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Min Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">250 Kg</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                    Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                        placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post
                                        Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <h1 class="fw-bold mb-0">Related products</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">


                    <div class="border border-primary rounded position-relative vesitable-item">

                        <!-- Ảnh sản phẩm (đều kích thước) -->
                        <div class="vesitable-img">
                            <img src="/img/fruite-item-1.jpg" class="img-fluid w-100 rounded-top product-img"
                                alt="">
                        </div>

                        <!-- Tag -->
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">
                            danh mục
                        </div>

                        <!-- Nội dung -->
                        <div class="p-4 pb-0 rounded-bottom">

                            <!-- Tên -->
                            <h4 class="fw-bold">sản phẩm 1</h4>

                            <!-- Đã bán -->
                            <p class="text-muted mb-2">Đã bán: 125</p>

                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">
                                    100 đ
                                </p>

                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                    Thêm
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <!-- Single Product End -->
@endsection
@section('js')
    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
        }
    </script>
@endsection
