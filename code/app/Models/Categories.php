<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use Sluggable;
    protected $slugFrom = 'name';
    protected $table = 'categories';

    protected $fillable = [
        'interior_id',
        'name',
        'slug',
        'image_url',
    ];

    public function interior()
    {
        return $this->belongsTo(Interior::class, 'interior_id');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
