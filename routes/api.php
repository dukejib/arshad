<?php

use Illuminate\Http\Request;
use App\Product;
use function GuzzleHttp\json_decode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('products','PassportController@get_products');

/**
 * Returns the date of last update
 * @return string date
 */
Route::get('latest',function(){
    $latest = Product::orderBy('updated_at','desc')->first();
    $date = new DateTime($latest->updated_at);
    return response()->json($date->format('Y-m-d'), 200);
});

Route::post('/register','PassportController@register');
Route::post('/login','PassportController@login');

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('details','PassportController@details');

});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
