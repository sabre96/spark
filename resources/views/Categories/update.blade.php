@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $category->name }}</h1>
            <ul class="list-group">
            </ul>
            <h3>Update category name</h3>
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