<?php

use App\Models\Products;
use App\Models\Categories;

return [

    'products' => [
        'model' => Products::class,
        'with'  => ['category'], // nếu có quan hệ
    ],

    'categories' => [
        'model' => Categories::class,
    ],

];
