<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    public $translatedAttributes = ['name','description','wight'];

    use Translatable;
    protected $guarded = ['id'];

    public function getImageUrlAttribute()
    {
        return asset('public/' . $this->image);
    }

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
