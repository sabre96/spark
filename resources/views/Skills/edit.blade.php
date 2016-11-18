@extends('spark::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $skill->name }}</h2></div>
                <div class="panel-body">
                    <ul class="list-group">
                    </ul>
                    <h3>Update skill name</h3>
                    <form role="form" action="/skill/{{ $skill->id }}/update" method="post">
                        {{ method_field('patch') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div id="nameDiv" class="form-group">
                            <textarea id="name" name="name" class="form-control">{{ $skill->name }}</textarea>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update skill</button>
                        </div>
                        <div class="form-group">
                            <a href="/categories/{{$skill->category_id}}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
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