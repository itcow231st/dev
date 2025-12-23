<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Accounts extends Authenticatable
{
    protected $table = 'accounts';
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function profile()
    {
        return $this->hasOne(Profiles::class, 'account_id');
    }

    public function carts()
    {
        return $this->hasMany(Carts::class, 'account_id');
    }
}
