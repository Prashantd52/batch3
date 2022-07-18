<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Session;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class BlogController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Blogs=Blog::with('categories')->get();
        return view('blog.index',compact('Blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $tags=Tag::all();

        return view('blog.create',compact('categories','tags')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $blog= new Blog;
        $blog->title=$request->title;
        $blog->category_id=$request->category_id;
        $blog->description=$request->description;

        if($request->file('image'))
        {
            $blog->media_path=$this->AddMedia($request->file('image'));
        }
        $blog->save();

        $blog->tags()->sync($request->tags);
        session()->flash('success','Blog Created Succesfully');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog=Blog::with(['comments','tags'])->find($id);
        // dd($blog);
        return view('blog.show',compact('blog'));
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

    public function remove_image($id)
    {
        // dd($id);
        $blog=Blog::find($id);

        $imagePath=public_path($blog->media_path);

        unlink($imagePath);

        $blog->media_path="";
        $blog->save();


        return redirect()->back()->with('warning','Image deleted');
    }
}
