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
Route::post('/login', 'Api\AuthenticationController@login')->name('api.login');
Route::post('/register', 'Api\AuthenticationController@registration')->name('api.registration');
Route::post('/forgot-password', 'Api\AuthenticationController@forgot_password')->name('api.forgot-password');
Route::post('/reset-password', 'Api\AuthenticationController@reset_password')->name('api.reset-password');

Route::middleware('auth:api')->get('/user', function (Request $request){
    $user = $request->user();
    if($user->status == '0'){
        return ['status'=>FALSE, 'data'=>[], 'message'=>'BLOCKED_ACCOUNT'];
    }
    return ['status'=>TRUE, 'data'=>$user];
});
Route::middleware('auth:api')->get('/reset-the-mindset', 'Api\ResetTheMindSetController@index')->name('api.reset-the-mindset');