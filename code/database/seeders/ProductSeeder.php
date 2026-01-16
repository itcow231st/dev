<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\Categories;
use App\Services\UploadFileService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // ✅ LẤY SERVICE ĐÚNG CÁCH
        $uploadService = app(UploadFileService::class);

        $categories = Categories::all();

        foreach ($categories as $category) {

            $keyword = $this->keywordByCategory($category->name);

            Products::factory()
                ->count(10)
                ->make()
                ->each(function ($product) use ($category, $keyword, $uploadService) {

                    // ⚠️ UNSPLASH DỄ BLOCK → DÙNG PICSUM
                    $response = Http::timeout(20)
                        ->get("https://picsum.photos/800/600");

                    if (!$response->ok()) {
                        return; // skip vòng này
                    }

                    $path = $uploadService->upload(
                        'products/' . Str::slug($category->slug),
                        $response->body(),
                        'jpg'
                    );

                    $product->category_id = $category->id;
                    $product->image_url  = $path;
                    $product->name       = $category->name . ' ' . fake()->words(2, true);

                    $product->save(); // ✅ INSERT Ở ĐÂY
                });
        }
    }

    private function keywordByCategory(string $name): string
    {
        return match ($name) {
            'Bàn học - Bàn làm việc' => 'study desk',
            'Tủ kệ văn phòng'       => 'office cabinet',
            'Tủ hồ sơ'              => 'file cabinet',
            'Kệ sách'               => 'bookshelf',
            'Quầy tính tiền'        => 'cashier counter',
            'Bàn ăn'                => 'dining table',
            'Tủ rượu'               => 'wine cabinet',
            'Quầy bar'              => 'home bar',
            'Kệ tivi'               => 'tv cabinet',
            'Bàn trà'               => 'coffee table',
            'Tủ giày'               => 'shoe cabinet',
            'Kệ trang trí'          => 'decor shelf',
            'Giường ngủ'            => 'bed',
            'Tủ quần áo'            => 'wardrobe',
            'Bàn trang điểm'        => 'dressing table',
            'Kệ máy giặt'           => 'washing machine shelf',
            'Tủ để đồ đa năng'      => 'storage cabinet',
            default                 => 'furniture',
        };
    }
}
