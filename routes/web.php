<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $category = App\Categoryy::where('Active','=',1)->get();
    $products = App\Product::where('discount_price','!=',null)->get();
   // return $products;
    return view('homepage',compact('category','products'));
});

Auth::routes();
Route::get('register/verify/{token}','Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index');

//Admin Routes Starts Here....
Route::resource('/admin','Admin\HomeController');
Route::resource('/category','Admin\CategoryController');
Route::resource('/category_insert','Admin\CategoryController');
Route::resource('cate_id','Admin\CategoryController');
//product
Route::resource('/products','Admin\ProductController');
Route::resource('/product_insert','Admin\ProductController');







