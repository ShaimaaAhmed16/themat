<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Page extends Model
{
    public $translatedAttributes = ['name'];

    use Translatable;
    protected $guarded = ['id'];

}
