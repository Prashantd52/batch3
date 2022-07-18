@extends('master')

@section('content')
<div class="container">
    <div class="card">
        <h1 class="card-title">{{$blog->title}}</h1>
        <div class="card-body">
        
            <div class="row form-group">
                <b>Category : </b>
                <p> {{$blog->categories->name}}</p>
            </div>
            <div class="row form-group">
                <b>Tags : </b>
                <ul>@foreach($blog->tags as $tag)
                    <li>{{$tag->name}}</li>
                    @endforeach
                </ul>
                
            </div>
            <div class="row form-group">
                <b>Description : </b>
                <p> {{$blog->Description}}</p>
            </div>
            @if($blog->media_path)
            <img src="{{asset($blog->media_path)}}" width="auto" height="100px"> 
               <a href="/blog/remove image/{{$blog->id}}">Delete image</a> 
            @endif
            <br>
            <h3>Comments <button type="button" class="btn btn-primary" title="add new comment" onclick="add_commemt({{$blog->id}})">+</button></h3>
            <div id="add_comment"></div>

            <ul>@foreach($blog->comments as $comment)
                <li>{{$comment->comment}} <a href="">edit</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

function add_commemt(id)
{
    $.ajax({
        type:"get",
        url:"/comment/create",
        data:{
            blog_id:id,
        },
        success: function(response)
        {
            // alert("success");
            console.log(response);
            $("#add_comment").html(response);
        },
        error: function(response)
        {
            alert("error");
        }
    })
}
</script>
@endsection