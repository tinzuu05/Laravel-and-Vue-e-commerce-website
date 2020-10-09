<?php

namespace App\Http\Controllers;

use App\Place;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $news_list = DB::table('news')->orderBy('id','desc')->take(3) ->get();
        return view('front/index',compact('news_list'));
    }

    public function news()
    {
        $news_list = DB::table('news')->orderBy('id','desc')->paginate(6);

        return view('front/news',compact('news_list'));
    }

    public function news_info($news_id)
    {
        $news = DB::table('news')->where('id', '=', $news_id)->first();
        return view('front/news_info',compact('news'));
    }

    public function product()
    {
        $product_list = Product::orderBy('id','desc')->paginate(6);

        return view('front/product', compact('product_list'));

    }

    public function product_info($product_id)
    {
        $product = Product::where('id', '=', $product_id)->first();
        return view('front/product_info',compact('product'));
    }

    public function contact_us()
    {
        return view('front/contact_us');
    }

    public function store_contact(Request $request)
    {
        // DB::table('place')->insert(
        //     ['email' => $request->email,
        //     'location' => $request->location,
        //     'image_url' => '',
        //     'place_name' => $request->place_name,
        //     'place_description' => $request->place_description]
        // );

        // ORM基本新增
        // $new_place = new Place();
        // $new_place -> email = $request ->email;
        // $new_place -> location = $request ->location;
        // $new_place -> image_url = '';
        // $new_place -> place_name = $request ->place_name;
        // $new_place -> place_description = $request ->place_description;

        // ORM create
        Place::create($request->all());

        return "新增成功";
    }
}
