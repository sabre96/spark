@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>All Branches</h1></div>
                <div class="panel-body">
                    <h2>Add a new branche</h2>
                    <form action="/newbranche" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Branche</button>
                        </div>
                    </form>
                    <hr>
                    <ul class="list-group">
                        @foreach($branches as $branche)
                            <li class="list-group-item"  onclick="location.href='/branche/{{ $branche->id }}'" onmouseover=" style='cursor:pointer';">
                                {{$branche->name}}
                            </li>
                        @endforeach
                    </ul>
        </div>
    </div>
    </div>
</div>
@endsection