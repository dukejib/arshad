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
// Route::get('/', function () {
//     return view('teaser');
//     // return view('welcome');  
// });

/** All Frontend Open Routes */
//===========================//
Route::get('/','FrontEndController@index')->name('home');
Route::get('/contactus','FrontEndController@contactus')->name('contactus');
Route::post('/contactus','FrontEndController@post_contactus')->name('contactus.post');
Route::get('/terms','FrontEndController@terms')->name('terms');
Route::get('/privacypolicy','FrontEndController@privacypolicy')->name('privacypolicy');
// Route::get('/faqs','FrontEndController@faqs')->name('faqs');
Route::get('/product/{slug}','FrontEndController@get_product')->name('view.product');
Route::get('/products/{slug}','FrontEndController@get_products')->name('view.products');


/** Login/Register Routes  */
//==========================/
// Route::get('/login','UserController@showLoginForm');
Route::post('/user/login','UserController@user_login')->name('user.login'); //Jquery for Login
Route::get('/user/register','UserController@showRegisterForm')->name('user.register');
Route::post('/user/register','UserController@register')->name('user.register');
// Route::get('/user/passforgot','FrontEndController@user_passforgot')->name('user.passforgot');

/** Socail Media Login */
//=====================//
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback')->name('facebook.callback');
Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback')->name('google.callback');

/** All Frontend Auth Routes */
//============================/
Route::middleware('auth')->group(function(){

    Route::get('/profile','HomeController@profile')->name('profile');
    Route::post('/profile/address','HomeController@address_update')->name('profile.address');
    Route::post('/user/logout','HomeController@logout')->name('logout');

});

/** Cart Related Routes */
//======================//
Route::get('/cart','CartController@cart')->name('cart'); //Show Cart
Route::get('/cart/add/{id}/{qty}','CartController@cartAdd')->name('cart.add');
Route::get('/cart/remove/{id}','CartController@cartRemove')->name('cart.remove');
Route::get('/cart/clear','CartController@clear_cart')->name('cart.clear'); //Clear Cart
Route::get('/cart/decrease_qty/{id}/{qty}','CartController@decrease_item')->name('cart.decrease');
Route::get('/cart/increase_qty/{id}/{qty}','CartController@increase_item')->name('cart.increase');
Route::get('/cart/showcheckout','CartController@showCartCheckout')->name('cart.checkout');// Moves to proceed
Route::get('/cart/proceedcheckout','CartController@cartProceed')->name('cart.proceed'); //Shows CartChecoutOriginal Page
Route::get('/cart/confirm/order','OrderController@store')->name('cart.confirm');
Route::get('/order/thankyou/{order}/{user}','OrderController@thankyou')->name('thanks');
/** Auto Generated Auth Routes */
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home'); 
/** Authenticted Routes */
//======================//
