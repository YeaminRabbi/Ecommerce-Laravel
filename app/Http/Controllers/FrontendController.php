<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Gallery;
use App\attributes;
use App\Blog;
use App\Cart;
use App\Comment;
use DB;
use Cookie;
use Illuminate\Support\Str;
use App\Review;
class FrontendController extends Controller
{
    function front()
    {
        return view('frontend.main',[
            'products'=> Product::latest()->limit(4)->get()
            
        ]);
    }

    function SingleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $gallery = Gallery::where('product_id', $product->id)->get();
        $attributes=attributes::where('product_id', $product->id)->get();
        $collection = collect($attributes);
        $groupBy=$collection->groupBy('color_id');

        $rating = Review::where('product_id', $product->id)->avg('rating');

        return view('frontend.single_product',[
            'product'=>$product,
            'gallery'=>$gallery,
            'groupBy'=>$groupBy,
            'reviews'=>Review::where('product_id', $product->id)->get(),
            'rating'=> $rating

        ]);
    }


    function GetSize($color, $product)
    {
        $output = ' ';
        $sizes = attributes::where('color_id', $color)->where('product_id', $product)->get();
        foreach($sizes as $size)
        {
            $output = $output." ".'<input name="size_id" type="radio" value="'.$size->size_id.'">'.    $size->size->size_name.'';
        }
        return $output;
    }

    function shop()
    {
        return view('frontend.shop',[
            'cats'=>Category::orderBy('category_name', 'asc')->get(),
            'products'=>Product::all()
        ]);
    }
    

   

    function showallblogs()
    {
     
        return view('frontend.blogs',[
            'blogs'=>Blog::latest()->paginate(3)
        ]);
    }

    function SingleBlog($slug)
    {
        $blog_post = Blog::whereSlug($slug)->first();
        return view('frontend.blog_details',[
            'blog'=> $blog_post,
            'catagories' => Category::all(),
            'related_blog'=>Blog::where('category_id', $blog_post->category_id)->get()->except(['id',$blog_post->id]),
            'comments'=>Comment::where('blog_id', $blog_post->id)->where('status', 2)->orderBy('id', 'desc')->get(),
            'comments_count'=>Comment::where('blog_id', $blog_post->id)->where('status', 2)->count()
        ]);
       
    }

    /**
     * Search Function
     */
    function search(Request $request)
    {
        $product = Product::query();

        if ($request->q)
        {
           
            $product->where('title','like','%'.$request->q.'%');
        }

        if ($request->q)
        {
            
            $product->orwhere('price','like','%'.$request->q.'%');
        }

        if ($request->q)
        {
            $product->orwhere('slug', 'like','%'.$request->q.'%');
        }

        $all_product = $product->get();

        return  $all_product;
    }


   
}

