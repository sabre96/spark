@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ $category->name }}</h1></div>
                <div class="panel-body">
                <h3>Add a new skill</h3>
                <form action="/newskill/{{ $category->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea name="name" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Skill</button>
                </div>
            </form>
            <ul class="list-group">
                @foreach($category->skills as $skill)
                    <li class="list-group-item" onclick="location.href='/skill/{{ $skill->id }}'" onmouseover=" style='cursor:pointer';">
                        {{ $skill->name }}
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    </div>
    </div>
@endsection