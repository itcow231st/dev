<section class="bg-light py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-4">Công trình tiêu biểu</h2>

        <div class="row g-3 gallery">
            {{-- @forelse ($service->galleries as $item)
                <div class="col-md-4">
                    <img
                        src="{{ asset($item->image) }}"
                        alt="{{ $item->title ?? $service->name }}"
                        class="img-fluid rounded shadow-sm"
                    >
                </div>
            @empty --}}
                <div class="col-12 text-center text-muted">
                    <p>Đang cập nhật hình ảnh công trình</p>
                </div>
            {{-- @endforelse --}}
        </div>
    </div>
</section>
