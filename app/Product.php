<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $fillable = [
        'category_id',
        'brand_id',
        'name',
        'description',
        'slug',
        'quantity',
        'price',
        'status',
        'offer_price',
        'admin_id'
    ];

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }


}
