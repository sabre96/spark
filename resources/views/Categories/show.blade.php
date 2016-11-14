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
                        <div id="nameDiv" class="form-group">
                            <textarea name="name" class="form-control"></textarea>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Skill</button>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-responsive sortable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($category->skills as $skill)
                            <tr>
                                <td>{{$skill->id}}</td>
                                <td>{{$skill->name}}</td>
                                <td>{{$skill->created_at}}</td>
                                <td>
                                    <a href="/skill/{{$skill->id}}/edit"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="var del = window.confirm('Are you sure you want to delete entry {{ $skill->name }}?');
                                               if (del) { document.location.href = '/skill/{{ $skill->id }}/delete'; }">
                                        Delete
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