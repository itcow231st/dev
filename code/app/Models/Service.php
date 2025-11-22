<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Sluggable;
    protected $slugFrom = 'name';
    protected $table = 'service';

    protected $fillable = [
        'name',
        'slug',
    ];
}
