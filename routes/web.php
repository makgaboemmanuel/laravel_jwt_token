<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::get('/getUsers', function () {
    /* this returns all users in the database, data returned is an array */
    $allUsers = json_decode(User::all());

    /* this returns all users in the database, data returned is an array */
    $aUser = json_decode(User::find(1));

    return "created_at: " . $aUser->created_at;

    // return view('welcome');
});

# getAllUsers
Route::get('/getAllUsersWeb', [AuthController::class, 'getAllUsersWeb']);
