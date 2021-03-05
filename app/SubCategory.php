<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategory extends Model
{
    use SoftDeletes;
    function category(){
        //We can use any of the two methods for forign key realtion

        //return $this->belongsTo('App\Category', 'category_id');

        return $this->belongsTo(Category::class);
     }
}
