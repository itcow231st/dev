<?php

namespace App\Models;

use App\Helpers\SlugHelper;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
   use Sluggable;
    protected $slugFrom = 'name';
    protected $table = 'interior';

    protected $fillable = [
        'name',
        'image_url',
        'slug',
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'interior_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'interior_id');
    }
}
