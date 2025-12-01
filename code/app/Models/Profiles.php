<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'account_id',
        'full_name',
        'phone_number',
        'address',
        'image_url'
    ];

    public function account()
    {
        return $this->belongsTo(Accounts::class, 'account_id');
    }
}
