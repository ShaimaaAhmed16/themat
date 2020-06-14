<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function products(){
        return $this->belongsToMany('App\Models\Product');
    }

    public function orderProducts(){
        return $this->hasMany('App\Models\OrderProduct');
    }
    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}
