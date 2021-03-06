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
	header('Content-Type: application/json');
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function(){
	Route::get('test', function(){
		$user = Auth::user();
		return $user;
	});
});


Route::resource('auditor', 'API\AuditorController');
Route::resource('enterprise', 'API\EnterpriseController');