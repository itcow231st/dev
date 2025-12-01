<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function account()
    {
        return $this->hasMany(Accounts::class, 'role_id');
    }
}
