<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'id',
		'Name',
		'City',
        'Ward',
        'Address',
        'Phone',
        'Email',
        'Date',
        'Status',
        'Method',
        'TotalQuantity',
        'TotalPrice'
    ];
}
