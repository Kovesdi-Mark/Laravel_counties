<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    function county(){
        return $this->belongsTo(County::class, 'id_county');
    }
}
