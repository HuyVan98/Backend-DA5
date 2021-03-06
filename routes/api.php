<?php

use Illuminate\Support\Facades\Route;

Route::post('loginApi', 'AdminController@loginApi');

Route::resource('quan-tri', 'UsersController');

Route::resource('danh-muc', 'CategoriesController');
Route::post('sua-danh-muc/{id}', 'CategoriesController@update');

Route::resource('san-pham', 'ProductsController');
Route::get('xem-san-pham/{id}', 'ProductsController@show');
Route::get('san-pham-moi', 'ProductsController@productNew');
Route::get('san-pham-theo-danh-muc/{id}', 'ProductsController@productcat');
Route::post('sua-san-pham/{id}', 'ProductsController@update');
Route::post('SaveFile', 'ProductsController@saveFile');
Route::post('them-binh-luan', 'ProductsController@StoreComment');
Route::get('search/{name}', 'ProductsController@search');

Route::post('buy', 'OrdersController@Buy');
Route::get('hoa-don', 'OrdersController@index');
Route::get('changestatus/{id}', 'OrdersController@changeStatus');
Route::get('show-order/{id}', 'OrdersController@showOrder');

// slider
Route::get('listslider', 'SliderController@index');
Route::get('slider/{id}', 'SliderController@getbyid');
// banner
Route::get('listbanner', 'BannerController@index');
Route::get('banner/{id}', 'BannerController@getbyid');
Route::post('banner_update/{id}', 'BannerController@bannerUpdate');

Route::get('thong-ke', 'AdminController@index');
