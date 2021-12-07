<?php

use App\Http\Controllers\PassportController;
use App\Http\Controllers\ShortnerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function(){
    Route::post('login', [PassportController::class, 'login']);
    Route::post('signup', [PassportController::class, 'signup']);
});
    
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', [PassportController::class, 'user']);
    Route::get('logout', [PassportController::class, 'logout']);

    //ShortURL
    Route::post('shortner', [ShortnerApiController::class, 'store']);    
    
});