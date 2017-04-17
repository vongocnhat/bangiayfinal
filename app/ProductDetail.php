<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
    protected $table = "productdetails";
    protected $fillable = [
            'IdProduct',
            'Image',
            'Image2',
            'Image3',
    ];
    public function Product()
    {
        return $this->belongsTo('App\Product', 'IdProduct', 'id');
    }
    public function ProductSQ()
    {
        return $this->hasMany('App\ProductSQ', 'IdProductDetail', 'id');
    }
}
