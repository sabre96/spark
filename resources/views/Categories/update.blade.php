@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ $category->name }}</h1></div>
                <div class="panel-body">
            <ul class="list-group">
            </ul>
            <h2>Update category name</h2>
            <form action="/updatecategory/{{ $category->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea name="name" class="form-control" required>{{ $category->name }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Name</button>
                </div>
            </form>
        </div>
    </div>
@endsection