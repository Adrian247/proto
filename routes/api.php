<?php

use App\Http\Controllers\Api\V1\ApiSessionController;
use App\Http\Controllers\Api\V1\User\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Login
Route::post('session/login', [ApiSessionController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], static function () {
    //****************************** SESSION *******************************
    Route::get('session/user', static function (Request $request) {
        return $request->user();
    });
    Route::post('session/logout', [ApiSessionController::class, 'logout']);
    //**************************** END SESSION *****************************
    //****************************** USER *******************************
    Route::resource('user', UserApiController::class);
    //**************************** END USER *****************************
});
