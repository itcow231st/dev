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
        'slug',
    ];
}
