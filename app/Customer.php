<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'streetNum',
        'zip',
        'city',
        'country',
        'kvk',
        'btw',
        'ending_on',
    ];

    protected $hidden = [
        'id',
        'user_id',
        'created_on'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function contactPerson () {
        return $this->hasOne(User::class);
    }
}
