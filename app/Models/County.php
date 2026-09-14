<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    function cities(){
        return $this->hasMany(City::class);
    }
}
