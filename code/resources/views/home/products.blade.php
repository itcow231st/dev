@extends('layouts.master')
@section('css')
<style>
    .product-card img {
        height: 220px;
        object-fit: cover;
    }

    .filter-bar .form-control,
    .filter-bar .form-select {
        height: 45px;
    }

    .product-card {
        transition: 0.2s;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    /* FIX pagination hiển thị ngang */
.pagination {
    display: flex !important;
    justify-content: center;
    gap: 6px;
}

.pagination ul {
    display: flex !important;
    padding-left: 0;
    margin-bottom: 0;
}

.pagination li {
    display: inline-block !important;
}

.pagination .page-link {
    display: inline-block !important;
     border-radius: 6px;
    padding: 6px 12px;
}

</style>

@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Interiors shop</h1>

        <!-- ---------------- FILTER BAR ---------------- -->
        <div class="filter-bar bg-light p-3 rounded mb-4 shadow-sm">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <input type="search" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                </div>

                <div class="col-md-4">
                    <select class="form-select">
                        <option value="">Tất cả danh mục</option>
                        <option>Apples</option>
                        <option>Oranges</option>
                        <option>Bananas</option>
                        <option>Pumpkin</option>
                    </select>
                </div>

                <div class="col-md-4 text-end">
                    <select class="form-select w-auto d-inline-block">
                        <option value="">Sắp xếp</option>
                        <option value="popularity">Phổ biến</option>
                        <option value="new">Mới nhất</option>
                        <option value="price">Giá thấp đến cao</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- ------------------------------------------------ -->

        <div class="row g-4 justify-content-center">

            <!-- PRODUCT ITEM -->
            @foreach ($products as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="rounded position-relative shadow-sm product-card bg-white">

                        <!-- Ảnh sản phẩm -->
                        <div class="fruite-img">
                            <a href="{{route('home.product.detail',['slug'=>$item->slug])}}">
                                <img src="{{ config('url.product') . '/' . $item->image_url }}"
                                     class="img-fluid w-100 rounded-top"
                                     alt="">
                            </a>
                        </div>

                        <!-- Tag danh mục -->
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                             style="top: 10px; left: 10px; font-size: 12px;">
                            {{ $item->category->name }}
                        </div>

                        <div class="p-3 border border-light border-top-0 rounded-bottom">

                            <!-- Tên sản phẩm -->
                            <h6 class="fw-bold mb-2">{{ $item->name }}</h6>

                            <!-- Số lượng đã bán -->
                            <p class="text-muted small mb-2">
                                Đã bán: <strong>{{ rand(20,200) }}</strong>
                            </p>

                            <!-- Giá + nút -->
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-dark fw-bold fs-5 mb-0">{{ number_format($item->price, 0, ',', '.') }}</p>
                                <button class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart"  data-url="{{ route('home.cart.add') }}"
                                            data-product-id="{{ $item->id }}" data-qty="1">
                                    <i class="fa fa-shopping-bag me-2"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- END PRODUCT ITEM -->

        </div>

        <!-- Pagination -->
        <div class="pagination d-flex justify-content-center mt-5">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
        {{-- <div class="pagination d-flex justify-content-center mt-5">
            <a href="#" class="rounded">&laquo;</a>
            <a href="#" class="active rounded">1</a>
            <a href="#" class="rounded">2</a>
            <a href="#" class="rounded">3</a>
            <a href="#" class="rounded">&raquo;</a>
        </div> --}}

    </div>
</div>
<!-- Fruits Shop End-->

    <!-- Fruits Shop End-->
@endsection
