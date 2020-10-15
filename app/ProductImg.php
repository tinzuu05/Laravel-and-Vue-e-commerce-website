<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $table = 'products_imgs';

    protected $fillable = [
        'img_url', 'product_id', 'sort'
    ];
}
