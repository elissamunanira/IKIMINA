<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,RoleController,DashboardController,SavingController,LoanController,LoanCategoryController};
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


Route::get('/calender', function () {
    return view('dashboard.app-event-calender');
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



    //Savings route

Route::get('/savings/{user}' , [SavingController::class, 'showSavings']);
Route::get('/saving/create' , [SavingController::class, 'create']);
Route::get('/saving' , [SavingController::class, 'index']) ;

Route::get('/totalSavings' , [SavingController::class, 'singleTotalSavings']);
Route::post('/savings' , [SavingController::class, 'store'])->name('savings.store');
Route::get('/my-savings', [SavingController::class, 'mySavings'])->name('my-savings');


    //Loan route
Route::get('/loan-request', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loan-request', [LoanController::class, 'store'])->name('loan.store');
Route::get('/loan-decision/{id}', [LoanController::class, 'show'])->name('loans.show');
Route::get('/loans' , [LoanController::class, 'index']);
Route::put('/loan/{id}', [LoanController::class, 'update'])->name('loan.update');
Route::get('/loan/{id}/edit', [LoanController::class, 'edit'])->name('loan.edit');


Route::get('/loan-categories', [LoanCategoryController::class, 'index']);
Route::get('/loan-categories/create', [LoanCategoryController::class, 'create']);
Route::post('/loan-categories/store', [LoanCategoryController::class, 'store'])->name('loan_categories.store');
Route::get('/loan-categories/{id}/edit', [LoanCategoryController::class, 'edit'])->name('loan_categories.edit');
Route::put('/loan-categories/{id}', [LoanCategoryController::class, 'update']);


});