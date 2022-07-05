@extends('master')

@section('content')
        <div class="container">
            <div class="card">
                <div class="card-title">
                    <h3 class="ml-2">Blog Index<a href="{{route('blog.create')}}"  target="_blank" title="create Blog">+</a><h3>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($Blogs as $Blog)
                                <tr>
                                    <td>{{$Blog->id}}</td>
                                    <td>{{$Blog->title}}</td>
                                    <td>{{$Blog->Description}}</td>
                                    <td>{{$Blog->categories->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection