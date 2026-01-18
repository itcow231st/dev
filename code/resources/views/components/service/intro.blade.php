<section class="container pt-7 pb-5">
    <div class="row align-items-center g-4">
        <div class="col-md-6">
            @if (isset($service->image_url))
                <img src="{{ config('url.product') . '/' . $service->image_url }}" class="img-fluid rounded shadow"
                    alt="{{ $service->name }}">
            @endif
        </div>
        <div class="col-md-6">
         @includeIf('home.services.content.' . $service->slug)
        </div>
    </div>
</section>
