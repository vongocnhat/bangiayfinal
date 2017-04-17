<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSQ extends Model
{
    //
    protected $table = 'productsqs';
    protected $fillable = [
            'IdProductDetail',
            'Size',
            'Quantity'
    ];
}
