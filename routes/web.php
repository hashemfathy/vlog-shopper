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

Route::get('/','IndexController@index')->name('get.index'); 
Route::get('/get-product-price','ProductsController@getProductPrice')->name('get.productPrice');
Route::get('/{name}','ProductsController@products')->name('get.products');
Route::get('/product-details/{id}','ProductsController@getDetails')->name('get.details');

Route::get('/admin','AdminController@getAdminLogin')->name('admin.getlogin');
Route::post('/admin','AdminController@postAdminLogin')->name('admin.postlogin');
Route::get('/admin/logout','AdminController@getAdminlogout')->name('admin.getlogout');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin/dashboard','AdminController@dashboard')->name('get.dashboard');
    Route::get('/admin/settings','AdminController@settings')->name('get.settings');
    Route::get('/admin/check-pwd','AdminController@checkPassword')->name('get.checkpassword');
    Route::post('/admin/update-password','AdminController@updatePassword')->name('update.password');
    // -------Category Routes --------------//
    Route::get('/admin/category','CategoryController@getCategorires')->name('get.categories');
    Route::get('/admin/add-category','CategoryController@getAddCategory')->name('getadd.category');
    Route::post('/admin/add-category','CategoryController@addCategory')->name('add.category');
    Route::get('/admin/edit-category/{category}','CategoryController@editCategory')->name('getedit.category');
    Route::post('/admin/edit-category/{id}','CategoryController@updateCategory')->name('update.category');
    Route::get('/admin/delete-category/{category}','CategoryController@deleteCategory')->name('delete.category');
    // -------Products Routes --------------//
    Route::get('/admin/{category}/Product','ProductsController@getProducts')->name('get.products');
    Route::get('/admin/add-product','ProductsController@getAddProduct')->name('getadd.product');
    Route::post('/admin/add-product','ProductsController@addProduct')->name('add.product');
    Route::get('/admin/edit-product/{product}','ProductsController@getEditProduct')->name('getedit.product');
    Route::post('/admin/edit-product/{id}','ProductsController@updateProduct')->name('update.product');
    Route::get('/admin/delete-product/{product}','ProductsController@deleteProduct')->name('delete.product');
  // -------Products_Attributes Routes --------------//
  Route::get('/admin/add-attributes/{id}','ProductsController@getAddAttributes')->name('getadd.attributes');
  Route::post('/admin/add-attributes/{id}','ProductsController@addAttributes')->name('add.attributes');
  Route::post('/admin/edit-attribute/{id}','ProductsController@updateAttribute')->name('update.attribute');
  Route::get('/admin/delete-attribute/{attribute}','ProductsController@deleteAttribute')->name('delete.attribute');





});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
