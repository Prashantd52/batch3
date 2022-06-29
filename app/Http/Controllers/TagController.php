<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags=Tag::get();

        return view('Tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Tag.create');
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

        $request->validate([
            'name'=>'required|unique:tags,name',
            'description'=> 'required|min:10|max:10'
        ]);

        $tag= new Tag;
        $tag->name=$request->name;
        $tag->description=$request->description;
        $tag->created_at=Carbon::now();
        $tag->updated_at=Carbon::now();
        $tag->save();

        return redirect()->route('t.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $tag=Tag::where('id',$request->id)->first();
        $tag->name=$request->name;
        $tag->description=$request->description;

        $tag->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag,Request $request)
    {
        //
        $tag=Tag::withTrashed()->find($request->id);

        if($tag->deleted_at)
        {
            $tag->forceDelete();
        }
        else
        {
            $tag->delete();
        }
        
        return redirect()->back();  //->route('t.index');
    }

    public function softdeleted_tags()
    {
        $tags=Tag::onlyTrashed()->get();

        return view('Tag.index',compact('tags'));
    }
}
