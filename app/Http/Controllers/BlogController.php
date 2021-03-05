<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Category;
use Str;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::paginate();
        return view('backend.blog.blog',[
            'blog'=>$blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.blog.blog-form',[
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => ['required', 'image']
        ]);
        $blog = new Blog;

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->summary = $request->summary;
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->user_id = Auth::id();
        $blog->save();


        if($request->hasFile('thumbnail'))
        {

            $image= $request->file('thumbnail');
            $ext = Str::slug($request->title).'.'. $image->getClientOriginalExtension();
            

            $thumbnail_location = 'images/thumbnail/'
            . Carbon::now()->format('Y/m/')
            .$blog->id.'/';
            //Make Directory 
            File::makeDirectory($thumbnail_location, $mode=0777, true, true);
            
            //save Image to the thumbnail path
            Image::make($image)->save(public_path($thumbnail_location.$ext));

            $blog_update = Blog::findOrFail($blog->id);
            $blog_update->thumbnail = $ext;
            $blog_update->save();

        }
        return back()->with('success', 'Blog Uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // return $blog;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
