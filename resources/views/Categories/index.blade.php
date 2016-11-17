@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>All Categories</h1></div>
                <div class="panel-body">
                    <h2>Add a new category</h2>
                    <form action="/categories/add" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div id="nameDiv" class="form-group">
                            <input id="name" type="text" name="name" class="form-control" placeholder="Category name"/>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" style="top:50%;" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-responsive sortable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th data-defaultsort="asc">Name</th>
                            <th>Created</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                       href="/categories/{{ $category->id }}">
                                        Go to
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="var del = window.confirm('Are you sure you want to delete entry {{ $category->name }}?');
                                               if (del) { document.location.href = '/categories/{{ $category->id }}/delete'; }">
                                        Delete
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                       href="/categories/{{ $category->id }}/edit">Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous">
    </script>
    <script>
        @if ($errors->has('name'))
            $("#nameDiv").addClass("has-error");
        @endif
    </script>
@endsection