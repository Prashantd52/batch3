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
                <li id="comm{{$comment->id}}"> {{$comment->comment}}<a href="#" onclick="editComment({{json_encode($comment)}})" data-target="#editModal" data-toggle="modal">edit</a> &emsp; <a href="#" onclick="deleteComment({{$comment->id}})">Delete</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>



<!-- edit model -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <div class="modal-body">
                <div class="card-body">
                <textarea class="form-control" name="comment" id="ed_comment" placeholder="Enter comment here" required></textarea>
                <input type="hidden" name="comment_id" value="" id="ed_comment_id">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateComment()" data-dismiss="modal">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- edit model closed -->
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
            // console.log(response);
            $("#add_comment").html(response);
        },
        error: function(response)
        {
            alert("error");
        }
    })
}

function editComment(commentData)
{
    console.log(commentData);
    $("#ed_comment").val(commentData.comment);
    $("#ed_comment_id").val(commentData.id);
}

function updateComment()
{
    var id=$("#ed_comment_id").val();
    var comment=$("#ed_comment").val();

    // console.log(id);
    // console.log(comment);
    $.ajax({
        type:"put",
        url:"/comment/"+id,
        data:{
            _token:"{{csrf_token()}}",
            
            comment:comment,
        },
        success: function(response)
        {
            console.log(response);
            // alert(response.message);
            var editbttn="<a href='#' onclick='editComment("+JSON.stringify(response.data)+")' data-target='#editModal' data-toggle='modal'>EDIT</a>";
            $("#comm"+id).html(response.data.comment+editbttn);
            
        },
        error: function(response)
        {
            alert("error occured");
        }
    })
}

function deleteComment(id)
{
    $.ajax({
        type:"get",
        url:"/api/deleteComment/"+id,
        success:function(response)
        {
            alert(response.message);
            if(response.status=="success")
            {
                $("#comm"+id).hide();
            }
            
        }
    })
}
</script>
@endsection