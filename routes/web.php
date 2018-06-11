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

Route::get('/', function () {
    return view('teaser');
    // return view('welcome');  
});


/** All Frontend Routes */
Route::get('/landing','FrontEndController@index')->name('home');
Route::get('/contactus','FrontEndController@contactus')->name('contactus');
Route::get('/product/{slug}','FrontEndController@get_product')->name('view.product');
Route::get('/products/{slug}','ForntEndController@get_products')->name('view.prdducts');

/** All Administration Routes */
Route::prefix('backend')->group(function(){

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::resource('product','ProductController');
    Route::resource('contact', 'ContactController');
    
});
