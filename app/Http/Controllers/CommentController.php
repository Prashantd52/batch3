<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $blog_id=$request->blog_id;
        return view('comment.create',compact('blog_id'));
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
        $comment= new  Comment;
        $comment->blog_id=$request->blog_id;
        $comment->comment=$request->comment;

        $comment->save();

        return redirect('blog/'.$request->blog_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
        // dd($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$commentID)
    {
        //
        // dd($comment);
        $existedComment=Comment::where('id',$commentID)->first();

        if($existedComment)
        {

            $existedComment->comment=$request->comment;
    
            $existedComment->save();
    
            return ['status'=>"success",'message'=>"Comment Updated Successfully","data"=>$existedComment];
        }
        else
        {
            return ['status'=>"error",'message'=>"Comment Not found","data"=>null];
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }


    public function delete_comment($id)
    {
        $comment=Comment::where('id',$id)->first();

        if($comment)
        {
            $comment->delete();
            return ['status'=>"success",'message'=>"Comment Deleted Successfully"];
        }
        else
            return ['status'=>"error",'message'=>"Comment Not found"];

        
    }
}
