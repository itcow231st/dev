<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    // Tự động tạo slug khi tạo model mới
    protected static function bootSluggable()
    {
        static::creating(function ($model) {
            $model->setSlug();
        });

        static::updating(function ($model) {
            $model->setSlug();
        });
    }

    // Hàm tạo slug từ field cấu hình
    public function setSlug()
    {
        if (!property_exists($this, 'slugFrom')) {
            throw new \Exception("You must define protected \$slugFrom in " . static::class);
        }

        $source = $this->{$this->slugFrom} ?? null;

        if (!$source) {
            return;
        }

        $slug = Str::slug($source);

        // Nếu cần đảm bảo unique trong DB
        $slug = $this->makeSlugUnique($slug);

        $this->slug = $slug;
    }

    // Tạo slug unique
    protected function makeSlugUnique($slug)
    {
        $original = $slug;
        $count = 1;

        while (static::where('slug', $slug)->where('id', '!=', $this->id)->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }
}
