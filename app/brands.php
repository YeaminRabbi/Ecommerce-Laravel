<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class brands extends Model
{
    use SoftDeletes;
    function Attribute(){
        return $this->hasMany(attributes::class, 'brand_id');
    }
}
