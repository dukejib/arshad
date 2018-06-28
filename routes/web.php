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


/** All Frontend Open Routes */
Route::get('/landing','FrontEndController@index')->name('home');
Route::get('/contactus','FrontEndController@contactus')->name('contactus');
Route::post('/contactus','FrontEndController@post_contactus')->name('contactus.post');
Route::get('/product/{slug}','FrontEndController@get_product')->name('view.product');
Route::get('/products/{slug}','FrontEndController@get_products')->name('view.products');

/** All Administration Routes */

Route::get('/profile', 'HomeController@index')->name('profile'); //Remove it

Route::get('/backend','LoginController@index')->name('backend');
Route::post('/login/custom','LoginController@login')->name('login.custom');
   
Route::group(['prefix' => 'backend' , 'middleware' => 'auth'],function(){

    Route::get('/dashboard',function(){
        return view('backend.dashboard');
    })->name('dashboard');

    Route::resource('product','ProductController');

    Route::resource('contact', 'ContactController');
    Route::get('/contact/read/{id}','ContactController@make_contact_read')->name('contact.make.read');
});

/** Auto Generated Auth Routes */
Auth::routes();


