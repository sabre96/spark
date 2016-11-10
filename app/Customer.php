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
        'user_id',
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
        'created_on'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
