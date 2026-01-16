<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use Sluggable;
    use HasFactory;
    protected $slugFrom = 'name';
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'slug',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function carts()
    {
        return $this->hasMany(Carts::class, 'product_id');
    }
}
