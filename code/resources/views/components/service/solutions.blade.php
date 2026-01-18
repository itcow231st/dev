<section class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Các loại & giải pháp</h2>
            <p>Phù hợp nhiều nhu cầu và ngân sách</p>
        </div>

        <div class="row g-4">
            @includeIf(
                'home.services.solutions.' . $slug
            )
        </div>
    </div>
</section>
