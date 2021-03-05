<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brands;
use App\colors;
use App\sizes;
use Carbon\Carbon;
use Illuminate\Support\Str;
class AttributesController extends Controller
{
    function ViewList()
    {
        $brands= brands::all();
        $colors= colors::all();
        $sizes= sizes::all();
        return view('backend.attributes.list',[
            'brands'=> $brands,
            'colors'=> $colors,
            'sizes'=> $sizes
        ]);
    }

    function BrandAdd()
    {
        return view('backend.attributes.brand-add');
    }

    function BrandPost(Request $req)
    {
    
      // insert using OBject (have advantange of auto saving in database field)
      $data = new brands();

      $data->brand_name = $req->brand_name;
      $data->slug=Str::slug($req->brand_name);
      $data->save();

      return redirect()->action('AttributesController@ViewList');
    }

    function BrandDelete($id)
    {
        brands::findOrFail($id)->delete();
        return back();
    }


    function BrandEdit($name,$id)
    {
        return view('backend.attributes.brand-update',[
            'name'=> $name,
            'id'=>$id
        ]);
    }

    function BrandUpdate(Request $req)
    {
        $id = $req->brand_id;
        $brand_name=$req->brand_name;
        brands::where('id',$id)->update([
            'brand_name'=>$brand_name,
            'slug'=> Str::slug($brand_name),
            'updated_at' => Carbon::now()
            ]);
   
            return redirect()->action('AttributesController@ViewList');
    }

    function ColorAdd()
    {
        return view('backend.attributes.color-add');
    }

    function ColorPost(Request $req)
    {
        // insert using OBject (have advantange of auto saving in database field)
      $data = new colors();

      $data->color_name = $req->color_name;
      $data->slug=Str::slug($req->color_name);
      $data->save();

      return redirect()->action('AttributesController@ViewList');
    }

    function ColorDelete($id)
    {
        colors::findOrFail($id)->delete();
        return back();
    }

    function ColorEdit($name,$id)
    {
        return view('backend.attributes.color-update',[
            'name'=> $name,
            'id'=>$id
        ]);
    }

    function ColorUpdate(Request $req)
    {
        $id = $req->color_id;
        $color_name=$req->color_name;
        colors::where('id',$id)->update([
            'color_name'=>$color_name,
            'slug'=> Str::slug($color_name),
            'updated_at' => Carbon::now()
            ]);
   
            return redirect()->action('AttributesController@ViewList');
    }

    function SizeAdd()
    {
        return view('backend.attributes.size-add');
    }

    function SizePost(Request $req)
    {
    // insert using OBject (have advantange of auto saving in database field)
      $data = new sizes();

      $data->size_name = $req->size_name;
      $data->slug=Str::slug($req->size_name);
      $data->save();

      return redirect()->action('AttributesController@ViewList');
    }

    function SizeDelete($id)
    {
        sizes::findOrFail($id)->delete();
        return back();
    }

    function SizeEdit($name,$id)
    {
        return view('backend.attributes.size-update',[
            'name'=> $name,
            'id'=>$id
        ]);
    }

    function SizeUpdate(Request $req)
    {
        $id = $req->size_id;
        $size_name=$req->size_name;
        sizes::where('id',$id)->update([
            'size_name'=>$size_name,
            'slug'=> Str::slug($size_name),
            'updated_at' => Carbon::now()
            ]);
   
            return redirect()->action('AttributesController@ViewList');
    }

}
