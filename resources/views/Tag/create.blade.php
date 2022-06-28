@extends('master')

@section('title')
Tag create Page
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-title">
            <h3 class="ml-2">Create Tag<h3>
        </div>
        <div class="card-body">
            <form action="{{route('t.store')}}" method="post">
                @csrf()
                @method('post')
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Tag Name</label>
                        <input type="text" class="form-control" name="name" value="">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Tag Description</label>
                        {{--<input type="text" class="form-control" name="description" value="">--}}
                        <textarea name="description" class="form-control"  Placeholder="Enter tag description"> </textarea>
                    </div>
                </div>
                <button type="submit"  class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection