<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }

    public function orderProducts(){
        return $this->hasMany('App\Models\OrderProduct');
    }
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
}
