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
                      <div class="nav-item dropdown">
                          <a href="{{route('home.products')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Nội thất</a>
                          <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            @foreach ($interiors as $interior)
                                <a href="{{route('home.interior.show',$interior)}}" class="dropdown-item">{{$interior->name}}</a>
                            @endforeach
                          </div>
                      </div>
                      <div class="nav-item dropdown">
                          <a href="{{route('home.service')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dịch vụ</a>
                          <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            @foreach ($services as $service)
                                <a href="{{route('home.service.show',$service)}}" class="dropdown-item">{{$service->name}}</a>
                            @endforeach
                          </div>
                      </div>
                      <a href="{{ route('home.contact', [], false) }}" class="nav-item nav-link">Giới thiệu</a>
                  </div>
                  <div class="d-flex m-3 me-0">
                      {{-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                          data-bs-toggle="modal" data-bs-target="#searchModal"><i
                              class="fas fa-search text-primary"></i>
                        </button> --}}
                      <div class="search-wrapper position-relative pe-3">
                          <form id="searchForm" action="{{ route('home.products') }}" method="GET"
                              class="d-flex align-items-center">

                              <!-- Input Desktop: luôn hiển thị -->
                              <input id="searchInputDesktop" name="q" type="text"
                                  class="form-control d-none d-lg-block search-desktop-input" placeholder="Tìm kiếm...">

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
                                  class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white px-1"style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ $cartCount ?? 0 }}</span>
                          </div>
                          <div class="cart-dropdown">
                              <div class="cart-header">Giỏ hàng ({{ $cartCount ?? 0 }})</div>
                              <ul class="cart-items">
                                  @forelse($cartItems ?? [] as $item)
                                      <li class="cart-item">
                                          <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">

                                          <div class="item-info">
                                              <div class="item-name">{{ $item->name }}</div>
                                              <div class="item-qty-price">
                                                  {{ $item->quantity }} × {{ number_format($item->price) }}đ
                                              </div>
                                          </div>

                                          <div class="item-total">
                                              {{ number_format($item->quantity * $item->price) }}đ
                                          </div>
                                      </li>
                                  @empty
                                      <li>Giỏ hàng trống</li>
                                  @endforelse
                              </ul>
                              <div class="cart-footer">
                                  <strong>Tổng: {{ $total ?? 0 }}</strong>
                                  <a href="{{ route('home.cart') }}" class="view-cart-btn">Xem giỏ</a>
                              </div>
                          </div>
                      </div>

                      <a href="{{ route('home.login', [], false) }}" class="my-auto">
                          <i class="fas fa-user fa-2x"></i>
                      </a>
                  </div>
              </div>
          </nav>
      </div>
  </div>
  <!-- Navbar End -->
