<?php

namespace App\Http\Controllers;
use App\SubCategory; 
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
   function SubCategoryView()
   {
       $scategories = SubCategory::with('category')->paginate();
       return view('backend.subcategory.subcategory-view' , [
           'scategories' => $scategories
       ]);
   }

   function SubCategoryAdd()
   {
    return view('backend.subcategory.subcategory-add', [
        'categories' => Category::orderBy('category_name', 'asc')->get()
    ]);
   }


   function SubCategoryPost(Request $request)
   {
       SubCategory::insert([
           'subcategory_name' => $request->subcategory_name,
           'slug' => Str::slug($request->subcategory_name),
           'category_id'=> $request->category_id,
           'created_at'=> Carbon::now()
       ]);
       return redirect('subcategory-view');
   }

   function SubCategoryDelete($id)
   {
    SubCategory::findOrFail($id)->delete();
    return back();
   
   }


   
   function SubCategoryEdit($id)
   {

      $subcategories= SubCategory::findOrFail($id);
      return view('backend.subcategory.subcategory-edit', [
          'subcategories' => $subcategories,
          'categories' => Category::orderBy('category_name', 'asc')->get()
      ]);
   }

   function SubCategoryUpdate(Request $req){
      

    $name= $req->subcategory_name;
    $id = $req->id;
    $category_id =$req->category_id;

    SubCategory::where('id',$id)->update([
       'subcategory_name'=>$name,
       'slug'=> Str::slug($name),
       'category_id'=> $category_id,
       'updated_at' => Carbon::now()
       ]);

       $scategories = SubCategory::paginate();
       return view('backend.subcategory.subcategory-view' , [
           'scategories' => $scategories
       ]);


 }

}
