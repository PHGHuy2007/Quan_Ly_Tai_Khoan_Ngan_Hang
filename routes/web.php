<?php

use App\Http\Controllers\BankAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('bank-accounts.index');
});

Route::get('/bank-accounts', [BankAccountController::class, 'index'])
    ->name('bank-accounts.index');

Route::get('/bank-accounts/create', [BankAccountController::class, 'create'])
    ->name('bank-accounts.create');

Route::post('/bank-accounts', [BankAccountController::class, 'store'])
    ->name('bank-accounts.store');
