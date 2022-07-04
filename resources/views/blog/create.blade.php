@extends('master')

@section('title')
Blog
@endsection

@section('content')
<div class="container">
    <h3 class="ml-2"> Blog</h3>
    <div class="card">
        <form action="{{route('blog.store')}}" method="post">
            @csrf()
            @method('post')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <b>Title :</b>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <b>Category :</b>
                        <select class="form-control" name="category_id" id="category_id">
                            <option selected>--- select category---</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <b>Description:</b>
                        <textarea class="form-control" name="description" id="description" rows="10" placeholder="Write Blog here" ></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection