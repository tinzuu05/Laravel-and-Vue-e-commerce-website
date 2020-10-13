<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index($product_type_id) {
        // 方法1
        // $products = Product::where('product_type_id', $product_type_id)->get();

        // 方法2 使用關聯法
        // $products = ProductType::find($product_type_id)->product;

        // 方法3 with用法
        $product_type = ProductType::where('id', $product_type_id)->with('product')->get();

        // dd($product_type);
        return view('front.product',compact('product_type'));
    }

}
