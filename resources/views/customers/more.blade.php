@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <h3>Company</h3>
        <table class="table table-striped table-responsive">
            <thead>
            <!-- headers here -->
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Street</th>
                <th>Zip</th>
                <th>City</th>
                <th>Country</th>
                <th>KVK</th>
                <th>BTW</th>
                <th>Start date</th>
                <th>End date</th>
            </tr>
            </thead>

            <tbody>
            <!-- foreach loop here -->
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->street }} {{ $customer->streetNum }}</td>
                <td>{{ $customer->zip }}</td>
                <td>{{ $customer->city }}</td>
                <td>{{ $customer->country }}</td>
                <td>{{ $customer->kvk }}</td>
                <td>{{ $customer->btw }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>{{ $customer->ending_on }}</td>
            </tr>
            </tbody>
        </table>
        <a class="btn btn-warning btn-sm" href="/customers/{{ $customer->id }}/edit">edit</a>
        <br/>

        <!-- Contact person -->
        <h3>Contact person</h3>
        <table class="table table-striped table-responsive">
            <thead>
            <!-- headers here -->
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Street</th>
                <th>Zip</th>
                <th>City</th>
                <th>Country</th>
            </tr>
            </thead>

            <tbody>
            <!-- foreach loop here -->
            <tr>
                <td>{{ $customer->p_firstName }}</td>
                <td>{{ $customer->p_lastName }}</td>
                <td>{{ $customer->p_email }}</td>
                <td>{{ $customer->p_phone }}</td>
                <td>{{ $customer->p_mobile }}</td>
                <td>{{ $customer->p_street }} {{ $customer->p_streetNum }}</td>
                <td>{{ $customer->p_zip }}</td>
                <td>{{ $customer->p_city }}</td>
                <td>{{ $customer->p_country }}</td>
            </tr>
            </tbody>
        </table>
        <button id="editPerson" class="btn btn-warning" type="button"
                onclick="$('#personForm').show(1000); $('#editPerson').hide(1000);">
            edit
        </button>
    </div>
    <script>
        //Company error's
        @if ($errors->has('name'))
            $("#nameDiv").addClass("has-error");
        @endif
        @if ($errors->has('email'))
            $("#emailDiv").addClass("has-error");
        @endif
        @if ($errors->has('phone'))
            $("#phoneDiv").addClass("has-error");
        @endif
        @if ($errors->has('street'))
            $("#streetDiv").addClass("has-error");
        @endif
        @if ($errors->has('streetNum'))
            $("#streetNumDiv").addClass("has-error");
        @endif
        @if ($errors->has('zip'))
            $("#zipDiv").addClass("has-error");
        @endif
        @if ($errors->has('city'))
            $("#cityDiv").addClass("has-error");
        @endif
        @if ($errors->has('country'))
            $("#countryDiv").addClass("has-error");
        @endif
        @if ($errors->has('kvk'))
            $("#kvkDiv").addClass("has-error");
        @endif
        @if ($errors->has('btw'))
            $("#btwDiv").addClass("has-error");
        @endif
        <!-- /company error if's -->
    </script>
@endsection
