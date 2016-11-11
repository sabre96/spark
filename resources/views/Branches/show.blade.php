@extends('spark::layouts.app')
<head>

</head>
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ $branche->name }}</h1></div>
                <div class="panel-body">
                    <div class="form-check">
                    <form action="/newcategory_branche/{{ $branche->id }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="list-group">
                        @foreach ($categories2 as $category)
                            <li class="list-group-item">{{ Form::checkbox('id[]', $category->id, in_array($category->id, $all_in_branche)) }}
                                {{ Form::label('category', $category->name) }}</li>
                        @endforeach
                    </ul>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item" onmouseover="" style="cursor: pointer;" onclick="location.href = '/category/{{ $category->id }}';">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        </div>
    </div>
    </div>
@endsection