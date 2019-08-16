<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1' , 'as' => 'v1'], function () {
    Route::post('login', 'v1\UserController@UserLogin');
    Route::post('forgot-password-request', 'v1\UserController@forgotpassword');
    Route::post('forgot-password-submit', 'v1\UserController@forgotpasswordSubmit');
    
	Route::get('get-settings', 'v1\SettingsController@getSettings');
	
	//Route::post('register', 'v1\UserController@register');
	
	Route::group(['middleware' => 'jwt.verify'], function () {
		 Route::get('logout', 'v1\UserController@logout');
	});	
});

