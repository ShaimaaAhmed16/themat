<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $guarded = ['id'];

    function socialProviders()
    {
        return $this->hasMany('App\Models\Social');
    }
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
