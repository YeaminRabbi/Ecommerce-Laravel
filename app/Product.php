<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
   
    function brand(){
        //We getting the brand_name using the foriegn key brand_id from the product table 
        return $this->belongsTo(brands::class);
     }

     function gallery()
     {
        return $this->hasMany(Gallery::class, 'product_id');
     }

     function category(){
            return $this->belongsTo(Category::class, 'category_id');
      }

      function subcategory(){
         return $this->belongsTo(SubCategory::class, 'subcategory_id');
       }

      function attribute()
      {
         return $this->hasMany(attributes::class, 'product_id');
      }

      function cart()
      {
         return $this->hasMany(Cart::class, 'product_id');
      }
    
    
}
