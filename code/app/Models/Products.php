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
        'image_url',
        'slug',
        'interior_id',
    ];

    public function interior()
    {
        return $this->belongsTo(Interior::class, 'interior_id');
    }

    public function carts()
    {
        return $this->hasMany(Carts::class, 'product_id');
    }
}
