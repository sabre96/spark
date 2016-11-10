@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h1>All Categories</h1></div>
            <div class="panel-body">
                <h2>Add a new category</h2>
                <form action="/newcategory" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <button style="top:50%;" class="btn btn-primary">Add Category</input>
                    </div>
                </form>
            <hr>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item"  onmouseover=" style='cursor:pointer';">
                            {{$category->name}}
                            <button class="btn btn-primary" style="float: right" onclick="location.href='/category/{{ $category->id }}'">Enter</button>
                            <button class="btn btn-primary" style="float: right" onclick="location.href='/category/delete/{{ $category->id }}'">Delete</button>
                            <button class="btn btn-primary" style="float: right" onclick="location.href='/category/update/{{ $category->id }}'">Update</button>
                        </li>
                    @endforeach
                </ul>
        </div>
        </div>
        </div>
    </div>
@endsection