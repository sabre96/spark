<?php

namespace Laravel\Spark\Http\Controllers\Settings;

use Laravel\Spark\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the settings dashboard.
     *
     * @return Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('spark::settings', compact('user'));
    }
}
