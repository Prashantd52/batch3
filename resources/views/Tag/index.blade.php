@extends('master')

@section('title')
 Tag Index
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-title">
            <h3 class="ml-2">Tag Index<a href="{{route('t.create')}}"  target="_blank" title="creat tag">+</a><h3>
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->description}}</td>
                            <td><div class="row">
                                <a class="btn btn-info" href="#" target="_blank">Show</a>&emsp;
                                <a  class="btn btn-primary"href="#" data-toggle="modal" data-target="#editModal"  onclick="edit({{json_encode($tag)}})" title="edit tag">edit</a>&emsp;
                                <form action="#" method="post">
                                    @csrf()
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$tag->id}}">
                                    <button  type="submit" class="btn btn-danger"> Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('t.update')}}" method="post">
            <div class="modal-body">
                <div class="card-body">
                    
                        @csrf()
                        @method('post')
                        <input type="hidden" name="id" value="" id="tag_id">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tag Name</label>
                                <input type="text" class="form-control" name="name" id="tag_name" value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Tag Description</label>
                                {{--<input type="text" class="form-control" name="description" value="">--}}
                                <textarea name="description" class="form-control"  Placeholder="Enter tag description" id="tag_descroption"></textarea>
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

{{-- edit modal closed  --}}
@endsection 

@section('script')

<script>
   function edit(tag) 
   {
        console.log(tag);
        $("#tag_id").val(tag.id);
        $("#tag_name").val(tag.name);
        $("#tag_descroption").html(tag.description);
   }
</script>
@endsection
 

