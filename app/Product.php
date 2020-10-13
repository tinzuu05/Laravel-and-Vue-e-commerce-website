<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'title', 'size', 'price', 'image_url', 'content', 'product_type_id'
    ];

    public function product_type()
    {
        return $this->belongsTo('App\ProductType');
    }
}
