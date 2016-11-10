<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider {
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor'   => 'Lilopel',
        'product'  => 'CV database',
        'street'   => 'Cyprusbaan 10',
        'location' => 'Capelle aan den IJssel, 2908 LT',
        'phone'    => '+31 (0)10-3030 340',
        'mail'     => 'info@lilopel.nl',
    ];
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'thomasfranken3@hotmail.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'thomasfranken3@hotmail.com',
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted () {
        Spark::useStripe()->noCardUpFront()->trialDays(10);

        Spark::freePlan()
             ->features([
                 'First', 'Second', 'Third'
             ]);

        Spark::plan('Basic', 'spark-test-1')
             ->price(10)
             ->features([
                 'First', 'Second', 'Third'
             ]);

        Spark::validateUsersWith(function () {
            return [
                'firstName' => 'required|max:50',
                'lastName'  => 'required|max:50',
                'email'     => 'required|email|max:255|unique:users',
                'password'  => 'required|min:6|confirmed',
                'type'      => 'required',
                'terms'     => 'required|accepted',
            ];
        });

        Spark::createUsersWith(function ($request) {
            $user = Spark::user();

            $data = $request->all();

            $user->forceFill([
                'companyName'                => $data['team'],
                'firstName'                  => $data['firstName'],
                'lastName'                   => $data['lastName'],
                'email'                      => $data['email'],
                'password'                   => bcrypt($data['password']),
                'type'                       => $data['type'],
                'last_read_announcements_at' => Carbon::now(),
                'trial_ends_at'              => Carbon::now()->addDays(Spark::trialDays()),
            ])->save();

            return $user;
        });
    }
}
