<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/* user defined namespaces */
use App\Http\Controllers\AuthController;
# use App\Http\Controllers\API\v1\AuthController;
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

/* used added endpoint */

# Route::post('/register' ,[AuthController::class, 'register']); // to make sure the new endpoint works fine

Route::get('/getAllUsers', [AuthController::class, 'getAllUsers']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    #logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

/*  with version control functionality  */
Route::prefix('v1')->group(function () {
    Route::post('/register', 'App\Http\Controllers\API\v1\AuthController@register');

    Route::get('/getAllUsers', [AuthController::class, 'getAllUsers']);

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'user']);
        #logout
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
