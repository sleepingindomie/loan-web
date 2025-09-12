<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\AuthController;

// Public routes for borrower authentication (login and register)
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Group of routes that require a user to be authenticated
Route::middleware('auth')->group(function () {
    // Main home page with the loan application form
    Route::get('/', [LoanApplicationController::class, 'showForm'])->name('home');
    
    // Route to handle the form submission
    Route::post('/loan-application', [LoanApplicationController::class, 'submit'])->name('submit.loan');
    
    // Borrower dashboard to see their applications
    Route::get('/my-loans', [LoanApplicationController::class, 'showLoans'])->name('borrower.loans');
    
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
