<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
        // dd($categories);
        return view('category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.category_create');
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
        $category=new Category;

        $category->name=$request->name;
        $category->description=$request->description;
        $category->created_at=Carbon::now();
        $category->updated_at=Carbon::now();

        $category->save();
        // dd($category);

        // return "Category created succesfully";
        return redirect()->route('c.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        //
        // dd($category,$slug);
        $categories=Category::where('id',$id)->first();
        // $category=Category::find($id);

        return view('category/edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        // dd($request);
        $Editcategory=Category::find($request->id);
        // dd($Editcategory);

        $Editcategory->name=$request->name;
        $Editcategory->description=$request->description;

        $Editcategory->save();

        // Category::where('id',$request->id)->update(['name'=>$request->name,'description'=>$request->description]);

        return redirect()->route('c.index');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,Request $request)
    {
        //
        Category::where('id',$request->id)->delete();

        return redirect()->route('c.index');

    }
}
