<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'account_id',
        'product_id',
        'qty',
        'price',
    ];
    public function account()
    {
        return $this->belongsTo(Accounts::class, 'account_id');
    }
}
