<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = "orderdetails";
    protected $fillable = [
        'id',
        'IdOrder',
        'IdProductDetail',
        //Price, 
        'Quantity'
    ];
    public function Order()
    {
        return $this->belongsTo('App\Order', 'IdOrder', 'id');
    }
    public function ProductDetail()
    {
        return $this->belongsTo('App\ProductDetail', 'IdProductDetail', 'id');
    }
}
