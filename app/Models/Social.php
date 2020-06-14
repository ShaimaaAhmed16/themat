<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $guarded = ['id'];

    function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
