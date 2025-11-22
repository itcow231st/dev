<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
    public static function make($modelClass, $value, $column = 'slug')
    {
        // Tạo slug cơ bản
        $slug = Str::slug($value);

        // Kiểm tra trùng slug
        $original = $slug;
        $count = 1;

        while ($modelClass::where($column, $slug)->exists()) {
            $slug = $original . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
