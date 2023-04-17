<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/table-basic', function () {
    return view('/dashboard/table-basic');
});


Route::get('/table-export', function () {
    return view('/dashboard/table-export');
});


Route::get('/table-row-select', function () {
    return view('/dashboard/table-row-select');
});


Route::get('/table-jsgrid', function () {
    return view('/dashboard/table-jsgrid');
});




Route::get('dash',[DashboardController::class, 'index']);
Route::get('login',[UserController::class, 'loginForm']);
Route::get('regis',[UserController::class, 'registerForm']);

Route::post('log',[UserController::class, 'login']);
Route::post('/users',[UserController::class, 'register']);



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});