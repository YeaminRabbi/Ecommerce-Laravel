<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class attributes extends Model
{
    use SoftDeletes;
    function Size(){
        return $this->belongsTo(sizes::class, 'size_id');
    }

    function Color(){
        return $this->belongsTo(colors::class, 'color_id');
    }

    function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    
}
