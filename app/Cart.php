<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable=[
        'quantity',
    ];

    function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    function Size(){
        return $this->belongsTo(sizes::class, 'size_id');
    }

    function Color(){
        return $this->belongsTo(colors::class, 'color_id');
    }
}
