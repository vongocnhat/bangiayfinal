<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
            'IdCategory',
            'Name',
            'BestSeller',
            'MostViewed',            
            'Description',
            'Price',
            'PricePromotion',
            // 'Image',
            //Total Quantity
    ];
    public function Category()
    {
        return $this->belongsTo('App\Category', 'IdCategory', 'id');
    }
    public function ProductDetail()
    {
        return $this->hasMany('App\ProductDetail', 'IdProduct', 'id');
    }
}
