<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\colors;
use App\brands;
use App\sizes;
use App\Gallery;
use App\attributes;
use Carbon\Carbon;
//use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class ProductController extends Controller
{
    function products()
    {
        
        return view('backend.product.product',[
            'products'=> Product::paginate(),
            'product_count'=>Product::count()
            
        ]);
    }

    function ProductAdd()
    {
        $subcategories = SubCategory::all();
        $categories = Category::all();
        $colors =colors::all();
        $sizes =sizes::all();
        $brands =brands::all();
        return view('backend.product.product-form',[
            'subcategories'=> $subcategories,
            'categories'=> $categories,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'brands'=>$brands
            
        ]);
    }

    function ProductDelete($id)
    {
        Product::findOrFail($id)->delete();
        return back();
    }

    function ProductPost(Request $req)
    {
        if($req->hasFile('thumbnail'))
        {

            $image= $req->file('thumbnail');
            $ext = Str::random(10).'.'. $image->getClientOriginalExtension();
            $prod = new Product;

            $thumbnail_location = 'images/'
            . Carbon::now()->format('Y/m/')
            .'/';
            //Make Directory 
            File::makeDirectory($thumbnail_location, $mode=0777, true, true);
            
            //save Image to the thumbnail path
            Image::make($image)->save(public_path($thumbnail_location.$ext));

           
            $prod->title = $req->title;
            $prod->slug = Str::slug($req->title);
            $prod->category_id = $req->category_id;
            $prod->subcategory_id = $req->subcategory_id;
            $prod->brand_id = $req->brand_id;
            $prod->price = $req->price;
            $prod->summary = $req->summary;
            $prod->description = $req->description;
            $prod->thumbnail = $ext;
            $prod->save();

            foreach ($req->color_id as $key => $value) {
                $attribute = new attributes;
                $attribute->product_id = $prod->id;
                $attribute->size_id = $req->size_id[$key];
                $attribute->color_id = $value;
                $attribute->quantity = $req->quantity[$key];
                $attribute->save();
            }  
        }

        if($req->hasFile('images')){

            $images = $req->file('images');

            $new_location = 'gallery/'
                . Carbon::now()->format('Y/m/')
                . $prod->id .'/';

            File::makeDirectory($new_location, $mode=0777, true, true);

            foreach ($images as $img) {
                $img_ext = Str::random(10).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save(public_path($new_location. $img_ext));

                $gallery = new Gallery;
                $gallery->product_id = $prod->id;
                $gallery->images = $img_ext;
                $gallery->save();
            }
            
        }

        return back()->with('product_add', 'Product Added Successfully!!!');
        
    }

    function ProductEdit($id)
    {
        $subcategories = SubCategory::all();
        $categories = Category::all();
        $brands = brands::all();
        $product = Product::where('id', $id)->first();
        return view('backend.product.product-edit',[
            'subcategories'=> $subcategories,
            'categories'=> $categories,
            'brands'=>$brands,
            'product'=>$product
        ]);
    }

    function ProductUpdate(Request $req)
    {
        // $req->validate([
        //     'thumbnail'=> ['required', 'image']
        // ]);

        $product = Product::findOrFail($req->product_id);

        if($req->hasFile('thumbnail')){

            $image = $req->file('thumbnail');
            $ext = Str::random(10).'.'.$image->getClientOriginalExtension();

            $old_img_location = public_path('images/'.$product->created_at->format('Y/m/').'/'.$product->thumbnail);
            //Delete previous Image
            if(file_exists($old_img_location)){

                unlink($old_img_location);

            }

            //Thumbnail location
            $thumbnail_location = 'images/'
            . Carbon::now()->format('Y/m/')
            .'/';
            //Make Directory 
            File::makeDirectory($thumbnail_location, $mode=0777, true, true);
            //save Image to the thumbnail path
            Image::make($image)->save(public_path($thumbnail_location.$ext));

            $product->thumbnail = $ext;
        }


        $product->title= $req->title;
        $product->price= $req->price;
        $product->slug= Str::slug($req->title);
        $product->summary= $req->summary;
        $product->description= $req->description;
        $product->brand_id= $req->brand_id;
        $product->category_id= $req->category_id;
        $product->subcategory_id= $req->subcategory_id;
        $product->save();

        return redirect()->route('products')->with('product_update', 'Product Updated Successfully!!!');
        
    }

    /**
     * Ajax For Update
     */
    function ProductUpdateAjax($id){
        $subcategories = SubCategory::where('category_id', $id)->get();

        return response()->json($subcategories);
    }



    function GalleryEdit($id)
    {   
        $gallery = Gallery::where('product_id', $id)->get();
        return view('backend.product.gallery-edit',[
            'gallery'=> $gallery,
            'product_id'=> $id
        ]);
    }

    function GalleryImageDelete($id)
    {
        $gallery=Gallery::findOrFail($id);
        
        $img_path = public_path('gallery/'.$gallery->created_at->format('Y/m/').$gallery->product_id.'/'.$gallery->images);
  
        if(file_exists($img_path)){
            unlink($img_path);
            $gallery->delete();
        }

        return back()->with('ImageDelete', 'Image Deleted Successfully!!!');
                
    }

    /**
     * MultiImage Update
     */
    function MultiImageUpdate(Request $req){

        //$prod = new Product;

        if($req->hasFile('images')){

           
            $product_id = $req->product_id;
            $images = $req->file('images');

            $new_location = 'gallery/'
                . Carbon::now()->format('Y/m/')
                . $product_id .'/';

            File::makeDirectory($new_location, $mode=0777, true, true);

            foreach ($images as $img) {
                $img_ext = Str::random(10).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save(public_path($new_location. $img_ext));

                $gallery = new Gallery;
                $gallery->product_id = $product_id;
                $gallery->images = $img_ext;
                $gallery->save();
            }
        }
        return back();
    }
}
