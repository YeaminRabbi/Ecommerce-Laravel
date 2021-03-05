<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gallery extends Model
{
    use SoftDeletes;

    function product()
     {
        return $this->belongsTo(Product::class);
     }
}
