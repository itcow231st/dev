<?php

use App\Models\Accounts;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Interior;
use App\Models\Roles;
use App\Models\Service;

return [

    'products' => [
        'model' => Products::class,
        'with'  => ['category'], // nếu có quan hệ
    ],

    'categories' => [
        'model' => Categories::class,
        'with'  => ['interior'], // nếu có quan hệ
    ],
    'interiors' => [
        'model' => Interior::class,
    ],
    'services'=>[
        'model' => Service::class,
    ],
    'roles' => [
        'model' => Roles::class,
    ],
    'accounts' => [
        'model' => Accounts::class,
        'with'  => ['role','profile'], // nếu có quan hệ

    ],

    

];
