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
Route::get('/product-details/{id}','ProductsController@getDetails')->name('get.details');
Route::post('/add-cart','ProductsController@addTocart')->name('add.cart');
Route::get('/cartProducts','ProductsController@cartProducts')->name('get.cart');
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct')->name('delete.productCart');
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity')->name('update.quantity');


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
    Route::get('/admin/add-images/{id}','ProductsController@getAddImages')->name('getadd.images');
    Route::post('/admin/add-images/{id}','ProductsController@addImages')->name('add.images');
    Route::get('/admin/delete-image/{id}','ProductsController@deleteImage')->name('delete.image');
    // -------Products_Attributes Routes --------------//
    Route::get('/admin/add-attributes/{id}','ProductsController@getAddAttributes')->name('getadd.attributes');
    Route::post('/admin/add-attributes/{id}','ProductsController@addAttributes')->name('add.attributes');
    Route::post('/admin/edit-attribute/{id}','ProductsController@updateAttribute')->name('update.attribute');
    Route::get('/admin/delete-attribute/{attribute}','ProductsController@deleteAttribute')->name('delete.attribute');
    // -------Coupons Routes --------------//
    Route::get('/admin/add-coupon','CouponsController@getaddCoupon')->name('get.addCoupon');
    Route::post('/admin/add-coupon','CouponsController@addCoupon')->name('add.Coupon');
    Route::get('/admin/view-coupons','CouponsController@viewCoupons')->name('view.Coupons');







});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{name}','ProductsController@products')->name('get.CategoryProducts');


