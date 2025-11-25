<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use Sluggable;
    protected $slugFrom = 'name';
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'imgage_url',
        'slug',
    ];

}
