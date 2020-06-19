<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $translatedAttributes = ['name'];

    use Translatable;
    protected $guarded = ['id'];

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

}
