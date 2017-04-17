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
Route::get('quanly', 'AdminController@getLogin')->name('quanly.login');
Route::post('quanly', 'AdminController@postLogin')->name('quanly.login');

Route::group(['prefix' => 'quanly', 'middleware' => 'AdminMiddleware'], function()
{
	Route::resource('category','CategoryController');
	Route::get('category/validate/{id}/{Name}', 'CategoryController@jqueryvalidate')->name('category.validate');
	
	Route::resource('product','ProductController');
	Route::get('product/validate/{id}/{Name}', 'ProductController@jqueryvalidate')->name('product.validate');

	Route::resource('productdetail','ProductDetailController');
	Route::resource('productsq','ProductSQController');

	Route::resource('admin', 'AdminController');
	Route::resource('customer', 'CustomerController');
//quanly order
	Route::resource('order','OrderController');
//quanly order detail
	Route::resource('orderdetail','OrderDetailController');
	Route::get('quanly/logout', 'AdminController@logout')->name('quanly.logout');
});

//customer
	Route::get('signup', 'CusProductController@signup')->name('cusproduct.signup');
	Route::post('signup', 'CusProductController@postsignup')->name('cusproduct.signup');
	Route::get('login', 'CusProductController@login')->name('cusproduct.login');
	Route::post('login', 'CusProductController@postlogin')->name('cusproduct.login');
	Route::get('logout', 'CusProductController@logout')->name('cusproduct.logout');

	
//order
	Route::get('/', 'CusProductController@index')->name('cusproduct.index');
//cart
	Route::get('load/cart', function(){
		return view('cusproduct.cart');
	})->name('cusproduct.constructcart');
	Route::get('cart/{id}/{Quantity}/{Size}/{xacdinh}', 'CusProductController@cart')->name('cusproduct.cart');
	// Route::get('updatecart/{id}/{Quantity}', 'CusProductController@updatecart')->name('cusproduct.updatecart');
	Route::get('deleteproductincart/{IdProductSQ}', 'CusProductController@deleteproductincart')->name('cusproduct.deleteproductincart');
//customer product load
	Route::get('/{numpage}', 'CusProductController@pagination')->name('cusproduct.pagination');
	Route::get('show/{id}', 'CusProductController@show')->name('cusproduct.show');
//order customer product
	Route::get('cusproduct/order','OrderController@create')->name('order.create');
	Route::post('cusproduct/order','OrderController@store')->name('order.store');
//nganluong success
	Route::get('cusproduct/order/success','OrderController@success')->name('order.success');

	//SwiftMailer ... by THANH DOI

	Route::get('cusproduct/lien-he', 'LienheController@getLienHe')->name('lien-he');
	Route::post('cusproduct/lien-he', 'LienheController@postLienHe')->name('lien-he');
