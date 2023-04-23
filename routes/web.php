<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,RoleController,DashboardController,SavingController};
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
    return view('dashboard.table-basic');
});


Route::get('/table-export', function () {
    return view('dashboard.table-export');
});


Route::get('/table-row-select', function () {
    return view('dashboard.table-row-select');
});


Route::get('/table-jsgrid', function () {
    return view('dashboard.table-jsgrid');
});

Route::get('/form-basic', function () {
    return view('dashboard.form-basic');
});


Route::get('/form-validation', function () {
    return view('dashboard.form-validation');
});


Route::get('/app-profile', function () {
    return view('dashboard.app-profile');
});


Route::get('/calendar', function () {
    return view('dashboard.app-event-calendar');
});






Route::get('login',[UserController::class, 'loginForm'])->name('login');
Route::get('regis',[UserController::class, 'registerForm']);

Route::post('log',[UserController::class, 'login']);
Route::post('/register',[UserController::class, 'register']);

Route::get('/logout',[UserController::class, 'logout']);




// Autheticanted Routes

Route::group(['middleware' => ['auth']], function() {
    Route::get('dash',[DashboardController::class, 'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


Route::get('/savings/{id}' , [SavingController::class, 'showSavings']);
Route::get('/saving/create' , [SavingController::class, 'create']);
Route::get('/savings' , [SavingController::class, 'index']) ;
// Route::post('/savings' , [SavingController::class, 'store'])->name('savings.store');
Route::get('/my-savings', [SavingController::class, 'mySavings'])->name('my-savings');

});