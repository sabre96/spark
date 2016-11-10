<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;

class User extends SparkUser {

    use CanJoinTeams;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'firstName',
        'lastName',
        'companyName',
        'email',
        'streetName',
        'houseNumber',
        'zipCode',
        'city',
        'country',
        'phone',
        'mobile',
        'kvk',
        'btw',
        'ending_on',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at'        => 'date',
        'uses_two_factor_auth' => 'boolean',
    ];

    /**
     * Get all of the user's tasks.
     */
    public function tasks () {
        return $this->hasMany(Task::class)->orderBy('created_at', 'asc');
    }

    /**
     * Get all of the user activity.
     */
    public function activity () {
        return $this->hasMany(Activity::class)->orderBy('created_at', 'desc');
    }

    public function customers () {
        return $this->hasMany(Customer::class);
    }
}
