<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', 'FrontController@index'); //首頁

Route::get('/news', 'FrontController@news'); //新聞頁
Route::get('/news_info/{news_id}', 'FrontController@news_info'); //新聞內頁
Route::get('/product', 'FrontController@product'); //全館商品
Route::get('/product_type/{product_type_id}', 'FrontController@product_type'); //全館商品
Route::get('/product_info/{product_id}', 'FrontController@product_info'); //全館商品內頁
Route::get('/contact_us', 'FrontController@contact_us'); //聯絡我們

Route::post('/store_contact', 'FrontController@store_contact'); //聯絡我們表單

//Shopping cart
Route::get('/cart','CartController@cart'); //結帳頁
Route::post('/addcart', 'CartController@addcart'); //一個產品加入購物車
Route::post('/changeProductQty','CartController@changeProductQty'); //於結帳業修改產品數量
Route::post('/deleteProductInCart','CartController@deleteProductInCart'); //於結帳業修改產品數量
// Route::get('/getContent', 'CartController@getContent'); //取得購物車內的所有商品
// Route::get('/TotalCart', 'CartController@TotalCart'); //取得購物車內的總金額

//後台
Auth::routes(['register'=>false]);

Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // ajax summernote images
    Route::post('/ajax_upload_img','AdminController@ajax_upload_img');
    Route::post('/ajax_delete_img','AdminController@ajax_delete_img');
    Route::post('/ajax_delete_multi_img','AdminController@ajax_delete_multi_img');
    Route::post('/ajax_sort_multi_img','AdminController@ajax_sort_multi_img');

    // news後台
    Route::get('/news', 'NewsController@index');
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/store', 'NewsController@store');
    Route::get('/news/edit/{news_id}', 'NewsController@edit');
    Route::post('/news/update/{news_id}', 'NewsController@update');
    Route::get('/news/destroy/{news_id}', 'NewsController@destroy');

    // product後台
    Route::get('/product', 'ProductController@index');
    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/store', 'ProductController@store');
    Route::get('/product/edit/{product_id}', 'ProductController@edit');
    Route::post('/product/update/{product_id}', 'ProductController@update');
    Route::get('/product/destroy/{product_id}', 'ProductController@destroy');


    // product_type後台
    Route::resource('product_type', 'ProductTypeController');
});
