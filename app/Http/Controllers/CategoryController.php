<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use App\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

   function __construct(){
      $this->middleware('verified');
   }

   function CategoryList()
   {
      $categories = Category::paginate();

      // $trash_categories = Category::onlyTrashed()->get();

      return view('backend.category.category-list' , [
         'categories'=> $categories
      ]);
   }

   function CategoryAdd()
   {
      return view('backend.category.category-add');
   }

   function CategoryPost(Request $req)
   {

      ///validating data from the FORM
      $req->validate([
         'category_name'=> ['required' , 'min:3', 'unique:categories']
      ]);


      // insert using OBject (have advantange of auto saving in database field)
      $data = new Category();

      $data->category_name = $req->category_name;
      $data->slug=Str::slug($req->category_name);
      $data->save();




      // array insert method
      // Category:: insert([
      //   //db column fields : data from FORMs
      //   'category_name'=> $req->category_name,
      //   'created_at'=> Carbon::now()
        
      // ]);

      //return back()->with('CategoryAdd','Category Add Successfully!');
         
      return redirect()->action('CategoryController@CategoryList');

   }

   function CategoryDelete($id)
   {
      $cat_product = Product::where('category_id', $id)->count();
      if($cat_product>0)
      {
         return back()->with('product_notify', "There are ".$cat_product." Product(s) under this Category, you cannot Delete this Category!!");

      }
      if($cat_product<=0)
      {
         Category::findOrFail($id)->delete();
         return back()->with('cat_delete', "Category Deleted!");
      }
      
   }


   function CategoryRestore($id,$cat)
   {
      $userdata = Category::withTrashed()->findOrFail($id)->restore();

      return back();

      
   }


   function CategoryPermanentDelete($id)
   {
      Category::withTrashed()->findOrFail($id)->forceDelete();

      return back()->with('Permanent Delete', 'Data Parmanently Deleted');
   }


   function CategoryEdit($id)
   {

      $categories = Category::paginate();

      $trash_categories = Category::onlyTrashed()->get();

      $edit_category= Category::findOrFail($id);
      return view('backend.category.category-edit' , [
         'categories'=> $categories,
         'trash_categories'=>$trash_categories,
         'edit_category'=> $edit_category
      ]);

   }

   function CategoryUpdate(Request $req){
      

      $name= $req->category_name;
      $id = $req->id;

      Category::where('id',$id)->update([
         'category_name'=>$name,
         'slug'=> Str::slug($name),
         'updated_at' => Carbon::now()
         ]);
      return redirect()->action('CategoryController@CategoryList');
   }

   function SelectedCategoryDelete(Request $req)
   {

      if($req->cat_id == "")
      {
         return back()->with('cat_not_select', "Category Not Selected!");
      }
      else{
         foreach($req->cat_id as $data)
         {
            Category::findOrFail($data)->delete();
         }
         return back()->with('cat_delete', "Category Deleted!");
      }
      
     
      
   }

}
