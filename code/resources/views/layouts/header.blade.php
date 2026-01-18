  <!-- Navbar start -->

  <div class="container-fluid fixed-top">
      <div class="container topbar bg-primary d-none d-lg-block">
          <div class="d-flex justify-content-between">
              <div class="top-info ps-2">
                  <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                          class="text-white">123 Street, New York</a></small>
                  <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                          class="text-white">Email@Example.com</a></small>
              </div>
              <div class="top-link pe-2 position-relative overflow-hidden" style="width: 260px; height: 22px;">
                  <div class="marquee">
                      <span>🎉 QUẢNG CÁO VÀ NỘI THẤT TRUNG KIÊN 🚚 </span>
                      <span>🎉 QUẢNG CÁO VÀ NỘI THẤT TRUNG KIÊN 🚚 </span>
                  </div>
              </div>
          </div>
      </div>
      <div class="container px-0">
          <nav class="navbar navbar-light bg-white navbar-expand-xl">
              <a href="{{ route('home.index', [], false) }}" class="navbar-brand">
                  <h1 class="text-primary display-6">TRUNG KIÊN</h1>
              </a>
              <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarCollapse">
                  <span class="fa fa-bars text-primary"></span>
              </button>
              <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                  <div class="navbar-nav mx-auto">
                      <a href="{{ route('home.index', [], false) }}" class="nav-item nav-link">Trang chủ</a>
                      <a href="{{ route('home.products', [], false) }}" class="nav-item nav-link ">Cửa hàng</a>
                      <!-- <div class="nav-item dropdown">
                          <a href="{{ route('home.products') }}" class="nav-link dropdown-toggle"
                              data-bs-toggle="dropdown">Nội thất</a>
                          <div class="dropdown-menu m-0 bg-secondary rounded-0">
                              @foreach ($interiors as $interior)
<a href="{{ route('home.interior.show', $interior) }}"
                                      class="dropdown-item">{{ $interior->name }}</a>
@endforeach
                          </div>
                      </div> -->
                      <div class="nav-item dropdown mega-dropdown position-static">
                          <a href="{{ route('home.products') }}" class="nav-link dropdown-toggle"
                              data-bs-toggle="dropdown">
                              Sản phẩm
                          </a>

                          <div class="dropdown-menu mega-menu w-100 shadow border-0">
                              <div class="container">
                                  <div class="row py-4">

                                      <!-- CỘT 1 -->
                                      @foreach ($interiors as $interior)
                                      <div class="col-md-3 col-12">
                                          <h6 class="mega-title"><a href="#">{{ $interior->name }}</a></h6>
                                          @foreach ($interior->Categories as $subCategory)
                                          <a href="{{ route('home.category.show', $subCategory->slug) }}" class="mega-link">{{ $subCategory->name }}</a>
                                          @endforeach
                                      </div>
                                        @endforeach

                                      <!-- CỘT 2 -->

                                      <div class="col-md-3 col-12">
                                          <h6 class="mega-title">Sản phẩm mới</h6>
                                          <a href="#" class="mega-link">Bộ sưu tập mới</a>
                                          <a href="#" class="mega-link">Xu hướng 2026</a>
                                      </div>

                                      <div class="col-md-3 col-12">
                                          <h6 class="mega-title">Deal sốc mỗi ngày</h6>
                                          <a href="#" class="mega-link">Giảm giá hôm nay</a>
                                          <a href="#" class="mega-link">Combo tiết kiệm</a>
                                      </div>

                                      <div class="col-md-3 col-12"></div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle"
                              data-bs-toggle="dropdown">Dịch vụ</a>
                          <div class="dropdown-menu m-0 bg-secondary rounded-0">
                              @foreach ($services as $service)
                                  <a href="{{ route('home.service.show', $service->slug) }}"
                                      class="dropdown-item">{{ $service->name }}</a>
                              @endforeach
                          </div>
                      </div>
                      <a href="{{ route('home.contact', [], false) }}" class="nav-item nav-link">Giới thiệu</a>
                  </div>
                  <div class="d-flex m-3 me-0">
                      <div class="search-wrapper position-relative pe-3">
                          <form id="searchForm" action="{{ route('home.products') }}" method="GET"
                              class="d-flex align-items-center">

                              <!-- Input Desktop: luôn hiển thị -->
                              <input id="searchInputDesktop" name="q" type="text"
                                  class="form-control d-none d-lg-block search-desktop-input"
                                  placeholder="Tìm kiếm...">

                              <!-- Icon Search -->
                              <button type="button" id="btnSearch"
                                  class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white ms-2">
                                  <i class="fas fa-search text-primary"></i>
                              </button>

                              <!-- Input Mobile: dạng dropdown -->
                              <div id="searchDropdown" class="search-dropdown d-lg-none">
                                  <input id="searchInputMobile" name="q" type="text" class="form-control"
                                      placeholder="Tìm kiếm...">
                              </div>

                          </form>
                      </div>

                      <div class="cart-wrapper" style="position: relative; display: inline-block;">
                          <div class="cart-icon me-4 my-auto" style="cursor:pointer; position:relative; padding:6px;">
                              <i class="fa fa-shopping-bag fa-2x text-primary"></i>
                              <span
                                  class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white px-1 cart-count"style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ $cartCount ?? 0 }}</span>
                          </div>
                          <div class="cart-dropdown">
                              <div class="cart-header">Giỏ hàng ({{ $cartCount ?? 0 }})</div>
                              <ul class="cart-items">
                                  @forelse($cartItems as $item)
                                      <li class="cart-item" data-id="{{ $item['id'] }}">
                                          <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('images/no-image.png') }}"
                                              alt="{{ $item['name'] }}">
                                          <div class="item-info">
                                              <div class="item-name">{{ $item['name'] }}</div>
                                              <div class="item-qty-price">
                                                  <span class="cart-qty">{{ $item['qty'] }}</span> ×
                                                  {{ number_format($item['price']) }}đ
                                              </div>
                                          </div>

                                          <div class="item-total">
                                              {{ number_format($item['qty'] * $item['price']) }}đ
                                          </div>
                                          <button class="remove-cart-item" data-id="{{ $item['id'] }}"
                                              title="Xóa sản phẩm">
                                              ✕
                                          </button>
                                      </li>
                                  @empty
                                      <li>Giỏ hàng trống</li>
                                  @endforelse
                              </ul>
                              <div class="cart-footer">
                                  <strong>Tổng:</strong>
                                  <span class="cart-total" data-total="{{ $cartTotal }}">
                                      {{ number_format($cartTotal) }}đ
                                  </span>
                                  <a href="{{ route('home.cart') }}" class="view-cart-btn">Xem giỏ</a>
                              </div>
                          </div>
                      </div>

                      {{-- <a href="{{ route('home.login', [], false) }}" class="my-auto">
                          <i class="fas fa-user fa-2x"></i>
                      </a> --}}
                      @auth('web')
                          <div class="dropdown my-auto">
                              <a href="#" class="d-flex align-items-center text-decoration-none"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="{{ Auth::guard('web')->user()->profile->avatar ?? asset('storage/default-avatar.png') }}"
                                      alt="avatar" class="rounded-circle" width="36" height="36">
                              </a>

                              <ul class="dropdown-menu dropdown-menu-start shadow mt-2" style="min-width: 220px;">

                                  <!-- Tên user -->
                                  <li>
                                      <a class="dropdown-item fw-semibold text-dark" href="{{ route('home.profile') }}">
                                          {{ Auth::guard('web')->user()->profile->full_name }}
                                      </a>
                                  </li>

                                  <li>
                                      <hr class="dropdown-divider">
                                  </li>

                                  <li>
                                      <a class="dropdown-item d-flex align-items-center"
                                          href="{{ route('home.profile') }}">
                                          <i class="fas fa-user-circle me-2"></i> Hồ sơ cá nhân
                                      </a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item d-flex align-items-center" href="#">
                                          <i class="fas fa-key me-2"></i> Đổi mật khẩu
                                      </a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item d-flex align-items-center" href="#">
                                          <i class="fas fa-box me-2"></i> Đơn hàng của tôi
                                      </a>
                                  </li>

                                  <li>
                                      <form action="{{ route('home.logout') }}" method="POST">
                                          @csrf
                                          <button class="dropdown-item text-danger d-flex align-items-center">
                                              <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
                                          </button>
                                      </form>
                                  </li>
                              </ul>
                          </div>
                      @else
                          <a href="{{ route('home.login') }}" class="my-auto">
                              <span class="text-white fw-semibold btn btn-primary">Đăng nhập</span>
                          </a>
                      @endauth

                  </div>
              </div>
          </nav>
      </div>
  </div>
  <!-- Navbar End -->
