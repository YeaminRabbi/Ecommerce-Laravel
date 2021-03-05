<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class sizes extends Model
{
    use SoftDeletes;
    function Attribute(){
        return $this->hasMany(attributes::class, 'size_id');
    }

    function Cart(){
        return $this->hasMany(Cart::class, 'size_id');
    }

   
}
