@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>All Branches</h1>
            <ul class="list-group">
                @foreach($branches as $branche)
                    <li class="list-group-item"  onclick="location.href='/branche/{{ $branche->id }}'" onmouseover=" style='cursor:pointer';">
                        {{$branche->name}}
                    </li>
                @endforeach
            </ul>
            <hr>
            <h3>Add a new branche</h3>
            <form action="/newbranche" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea name="name" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Branche</button>
                </div>
            </form>
        </div>
    </div>
@endsection