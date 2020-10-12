<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'title', 'size', 'price', 'image_url', 'content', 'type_id'
    ];

    public function product_type()
    {
        return $this->belongsTo('App\Product','type_id');
    }
}
