<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileDetailsController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        $this->middleware('auth');
    }

    /**
     * Update the user's profile details.
     *
     * @return Response
     */
    public function update () {
        $user = Auth::user();

        $this->validate(request(), [
            'type'        => 'required|filled',
            'ending_on'   => 'required_if:type,Company,Contact person|date',
            'firstName'   => 'required|max:50|filled',
            'lastName'    => 'required|max:50|filled',
            'companyName' => 'required|max:100|filled',
            'email'       => 'email|required|max:255|unique:users,email,' . $user->id . '|filled',
            'streetName'  => 'required|max:100|filled',
            'houseNumber' => 'required|max:11|max:11|filled',
            'zipCode'     => 'required|max:10|filled',
            'city'        => 'required|max:100|filled',
            'country'     => 'required|max:100|filled',
            'phone'       => 'required|max:15|filled',
            'mobile'      => 'required|max:15|filled',
            'kvk'         => 'required_if:type,Company|digits:8|unique:users,kvk,' . $user->id,
            'btw'         => 'required_if:type,Company|max:15|unique:users,btw,' . $user->id,
        ]);

        if (!( (request()->type == "Company") || (request()->type == "Contact person") )) {
            $ending = null;
        } else {
            $ending = request()->ending_on;
        }

        request()->user()->forceFill([
            'type'        => request()->type,
            'ending_on'   => $ending,
            'firstName'   => request()->firstName,
            'lastName'    => request()->lastName,
            'companyName' => request()->companyName,
            'email'       => request()->email,
            'streetName'  => request()->streetName,
            'houseNumber' => request()->houseNumber,
            'zipCode'     => request()->zipCode,
            'city'        => request()->city,
            'country'     => request()->country,
            'phone'       => request()->phone,
            'mobile'      => request()->mobile,
            'kvk'         => request()->kvk,
            'btw'         => request()->btw,
        ])->save();
    }
}