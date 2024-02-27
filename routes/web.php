<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,RoleController,DashboardController,SavingController,LoanController,LoanCategoryController,PenaltyController,RuleController,MyAccountController, BudgetController,BudgetLineController,ExpenseController,MituelleController,LoanPaymentController,ForgetPasswordManager};

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
    return view('home.index');
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

Route::get('/logout',[UserController::class, 'logout'])->name('logout');

Route::get('/forget-password',[ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password',[ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}',[ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password',[ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');




// Autheticanted Routes

Route::group(['middleware' => ['auth']], function() {
Route::get('ikimina-dashboard',[DashboardController::class, 'index']);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

//active members

Route::get('active-members',[UserController::class, 'ActiveMembers']);



    //Savings route

Route::get('/savings/{user}' , [SavingController::class, 'showSavings']);
Route::get('/saving/create' , [SavingController::class, 'create']);
Route::post('/savings' , [SavingController::class, 'store'])->name('savings.store');
Route::get('/saving' , [SavingController::class, 'index'])->name('savings.index');
Route::get('/saving/{id}/edit' , [SavingController::class, 'edit'])->name('saving.edit');
Route::put('/saving/{savings}' , [SavingController::class, 'update'])->name('savings.update');
Route::delete('/saving/{id}' , [SavingController::class, 'delete']);
Route::get('/totalSavings' , [SavingController::class, 'singleTotalSavings'])->name('savings.totalSavings');


Route::get('/import', [SavingController::class, 'showForm'])->name('import.form');
Route::post('/import', [SavingController::class, 'import'])->name('saving.import');

  //my account

Route::get('/my-saving', [MyAccountController::class, 'mySaving'])->name('my-saving');
Route::get('/my-loan', [MyAccountController::class, 'myLoan'])->name('my-loan');
Route::get('/my-penalties', [MyAccountController::class, 'myPenalty'])->name('my-penalties');
Route::get('/my-mituelles', [MyAccountController::class, 'myMituelle'])->name('my-mituelles');


    //Loan route

Route::get('/loan-request', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loan-request', [LoanController::class, 'store'])->name('loan.store');
Route::get('/loan-decision/{id}', [LoanController::class, 'show'])->name('loans.show');
Route::get('/loans' , [LoanController::class, 'index'])->name('loans.index');
Route::put('/loan/{id}', [LoanController::class, 'loanStatus'])->name('loan.loanStatus');
Route::put('/loan/{id}', [LoanController::class, 'update'])->name('loan.update');
Route::get('/loan/{id}/edit', [LoanController::class, 'edit'])->name('loan.edit');
Route::get('/user/{user}/loans', [LoanController::class, 'details'])->name('loan.details');
// Route::get('/loan/{id}/payment', [LoanController::class, 'details'])->name('loan.details');


Route::get('/loan-categories', [LoanCategoryController::class, 'index']);
Route::get('/loan-categories/create', [LoanCategoryController::class, 'create']);
Route::post('/loan-categories/store', [LoanCategoryController::class, 'store'])->name('loan_categories.store');
Route::get('/loan-categories/{id}/edit', [LoanCategoryController::class, 'edit'])->name('loan_categories.edit');
Route::put('/loan-categories/{id}', [LoanCategoryController::class, 'update']);
// Route::get('/calculate_interest', [LoanController::class, 'calculateInterest'])->name('calculate-interest');

//loan payment

// Define a route to display the payment recording form
Route::get('/record-loan-payment/{loan}', [LoanPaymentController::class, 'showPaymentForm'])->name('loan-payment');

// Define a route to process payment recording
Route::post('/record-payment', [LoanPaymentController::class, 'recordPayment'])->name('payments.record');

Route::get('/loan-payment-records', [LoanPaymentController::class, 'index']);

    //penalties routes

Route::get('/penalties', [PenaltyController::class, 'index'])->name('penalties.index');
Route::get('/penalties/create', [PenaltyController::class, 'create'])->name('penalties.create');
Route::post('/penalties/store', [PenaltyController::class, 'store'])->name('penalties.store');
Route::get('/penalties/{penalty}/edit', [PenaltyController::class, 'edit'])->name('penalties.edit');
Route::put('/penalties/{penalty}',  [PenaltyController::class, 'update'])->name('penalties.update');
Route::delete('/penalties/{penalty}',  [PenaltyController::class, 'destroy'])->name('penalties.destroy');


    //rules routes

Route::get('/rules', [RuleController::class, 'index'])->name('rules.index');
Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
Route::post('/rules', [RuleController::class, 'store'])->name('rules.store');
Route::get('/rules/{rule}/edit', [RuleController::class, 'edit'])->name('rules.edit');
Route::put('/rules/{rule}', [RuleController::class, 'update'])->name('rules.update');
Route::delete('/rules/{rule}', [RuleController::class, 'destroy'])->name('rules.destroy');


    //budget routes

Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
Route::get('/budgets/{budget}', [BudgetController::class, 'show'])->name('budgets.show');
Route::get('/budgets/{budget}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
Route::put('budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
Route::delete('budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');

// Budgetline routes

// Route::get('/budgetlines/{budget}', [BudgetLineController::class, 'index'])->name('budgets.budgetlines.index');
// Route::get('/budgetlines/{budget}/create', [BudgetLineController::class, 'create'])->name('budgets.budgetlines.create');


// Route::resource('budgets.budgetlines', 'BudgetLineController');
// Route::resource('budgets.budgetlines.expenses', 'ExpenseController');


Route::prefix('budgets')->group(function () {
    Route::get('{budget}/budgetlines', [BudgetLineController::class, 'index'])->name('budgets.budgetlines.index');
    Route::get('{budget}/budgetlines/create', [BudgetLineController::class, 'create'])->name('budgets.budgetlines.create');
    Route::post('{budget}/budgetlines', [BudgetLineController::class, 'store'])->name('budgets.budgetlines.store');
    Route::get('{budget}/budgetlines/{budgetLine}', [BudgetLineController::class, 'show'])->name('budgets.budgetlines.show');
    Route::get('{budget}/budgetlines/{budgetLine}/edit', [BudgetLineController::class, 'edit'])->name('budgets.budgetlines.edit');
    Route::put('{budget}/budgetlines/{budgetLine}', [BudgetLineController::class, 'update'])->name('budgets.budgetlines.update');
    Route::delete('{budget}/budgetlines/{budgetLine}', [BudgetLineController::class, 'destroy'])->name('budgets.budgetlines.destroy');
});



    // Routes for Expenses
    // Route::resource('budget_lines.expenses', 'ExpenseController')->except(['index', 'show']);
    Route::get('budget_lines/{budget_line}/expenses', [ExpenseController::class, 'index'])->name('budget_lines.expenses.index');
    Route::get('budget_lines/{budget_line}/expenses/create', [ExpenseController::class, 'create'])->name('budget_lines.expenses.create');
    Route::post('budget_lines/{budget_line}/expenses', [ExpenseController::class, 'store'])->name('budget_lines.expenses.store');
    Route::get('budget_lines/{budget_line}/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('budget_lines.expenses.edit');
    Route::put('budget_lines/{budget_line}/expenses/{expense}', [ExpenseController::class, 'update'])->name('budget_lines.expenses.update');
    Route::delete('budget_lines/{budget_line}/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('budget_lines.expenses.destroy');
    Route::get('budget_lines/{budget_line}/expenses/{expense}', [ExpenseController::class, 'show'])->name('budget_lines.expenses.show');

    //comparison/ reality of the budget and expense
    Route::get('/budget/{budgetId}/compare', [BudgetController::class, 'compareBudgetExpenses'])->name('budget.compare');

    //routes for mituelle
   
    Route::get('/mituelles/{user}' , [MituelleController::class, 'showMituelles']);
    Route::get('/mituelle/create' , [MituelleController::class, 'create']);
    Route::post('/mituelles' , [MituelleController::class, 'store'])->name('mituelle.store');
    Route::get('/mituelle' , [MituelleController::class, 'index'])->name('mituelles.index');
    Route::get('/mituelle/{id}/edit' , [MituelleController::class, 'edit'])->name('mituelle.edit');
    Route::put('/mituelle/{mituelles}' , [MituelleController::class, 'update'])->name('mituelles.update');
    Route::delete('/mituelle/{id}' , [MituelleController::class, 'delete']);
    Route::get('/total-mituelle' , [MituelleController::class, 'singleTotalMituelles'])->name('mituelles.totalmituelles');

});