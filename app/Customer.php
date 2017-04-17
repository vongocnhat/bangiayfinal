<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    //
    protected $fillable = [
            'Name',
            'Gender',
            'Birthday',
            'City',
            'Ward',
            'Address',
            'Phone',
            'Email',
            'User',
            'Balance',
            'AccountNumber',
            'password',
            'IsActive'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
