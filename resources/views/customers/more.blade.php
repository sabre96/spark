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
                <th>Address</th>
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
                <td><a class="btn btn-warning btn-sm" href="/customers/{{ $customer->id }}/edit">edit</a></td>
            </tr>
            </tbody>
        </table>
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
                <th>Address</th>
                <th>Zip</th>
                <th>City</th>
                <th>Country</th>
                <th>Start date</th>
                <th>End date</th>
            </tr>
            </thead>

            <tbody>
            @if ($person)
            <tr>
                <td>{{ $person->firstName }}</td>
                <td>{{ $person->lastName }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->phone }}</td>
                <td>{{ $person->streetName }} {{ $person->houseNumber }}</td>
                <td>{{ $person->zipCode }}</td>
                <td>{{ $person->city }}</td>
                <td>{{ $person->country }}</td>
                <td>{{ $person->created_at }}</td>
                <td>{{ $person->ending_on }}</td>
            </tr>
            @endif
            </tbody>
        </table>
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
