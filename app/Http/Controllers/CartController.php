<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function cart(){
        $userId = auth()->user()->id; // or any string represents user identifier
        $cart_items = \Cart::session($userId)->getContent()->sort();
        $total_price = \Cart::session($userId)->getTotal();

        return view('front.cart',compact('cart_items', 'total_price'));
    }

    public function addcart(Request $request){
        $product_id = $request->product_id;

        $product = Product::find($product_id);

        $userId = auth()->user()->id; // or any string represents user identifier
        \Cart::session($userId)->add($product_id, $product->title, $product->price, 1, array('image' => $product->image_url));

        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
        return $cartTotalQuantity;
    }

    public function changeProductQty(Request $request) {
        $product_id = $request->product_id;
        $new_qty = $request->new_qty;

        $userId = auth()->user()->id; // or any string represents user identifier
        \Cart::session($userId)->update($product_id , array(
            'quantity' => array(
                'relative' => false,
                'value' => $new_qty,
            ),
          ));

        return "suceess";
    }

}
