<?php

use App\Events\ContactMadeEvent;
use App\Http\Controllers\HomeController;

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
/** Remove this route in production */
Route::get('/', function () {
    return view('teaser');
    // return view('welcome');  
});



// Route::get('event',function(){

//     $contact = array(
//         'username' => 'Ali',
//         'email' => 'some@m.com',
//         'number' => '03434',
//         'reason' => 'feedback',
//         'comment' => 'ccc'
//     );

//     event(new ContactMadeEvent($contact) );
// });


/** All Frontend Open Routes */
//===========================//
Route::get('/landing','FrontEndController@index')->name('home');
Route::get('/contactus','FrontEndController@contactus')->name('contactus');
Route::post('/contactus','FrontEndController@post_contactus')->name('contactus.post');
Route::get('/product/{slug}','FrontEndController@get_product')->name('view.product');
Route::get('/products/{slug}','FrontEndController@get_products')->name('view.products');
Route::get('/user/register','FrontEndController@user_register')->name('user.register');
Route::get('/user/passforgot','FrontEndController@user_passforgot')->name('user.passforgot');

Route::post('/user/login','Auth\LoginController@user_login')->name('user.login');
//Facebook Socialite Login/Callback
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback')->name('facebook.callback');
Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback')->name('google.callback');



/** Cart Related Routes */
//======================//
Route::get('/cart','CartController@cart')->name('cart'); //Show Cart
Route::get('/cart/add/{id}/{qty}','CartController@cartAdd')->name('cart.add');
Route::get('/cart/remove/{id}','CartController@cartRemove')->name('cart.remove');
Route::get('/cart/clear','CartController@clear_cart')->name('cart.clear'); //Clear Cart
Route::get('/cart/decrease_qty/{id}{qty}','CartController@decrease_item')->name('cart.decrease');
Route::get('/cart/increase_qty/{id}{qty}','CartController@increase_item')->name('cart.increase');
Route::get('/cart/checkout','CartController@cartCheckout')->name('cart.checkout');

/** Auto Generated Auth Routes */
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home'); 
/** Authenticted Routes */
//======================//
Route::get('/profile','HomeController@profile')->name('profile');