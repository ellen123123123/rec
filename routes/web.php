<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExpenseController::class, 'index'])->name('home');
Route::get('/earn', [ExpenseController::class, 'earn'])->name('earn');
Route::get('/expense', [ExpenseController::class, 'expense'])->name('expense');
Route::post('/incomes/store', [ExpenseController::class, 'storeIncome'])->name('incomes.store');
Route::post('/expenses/store', [ExpenseController::class, 'storeExpense'])->name('expenses.store');

Route::get('/manage-categories', [CategoryController::class, 'index'])->name('manage-categories');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/historico/ganhos', [HistoryController::class, 'earns'])->name('historic.ganhos');
Route::get('/historico/despesas', [HistoryController::class, 'expenses'])->name('historic.despesas');

Route::resource('incomes', ExpenseController::class)->only([
    'store', 'destroy'
])->names([
    'store' => 'incomes.store',
    'destroy' => 'incomes.destroy'
]);

Route::delete('/incomes/{income}', [ExpenseController::class, 'destroyIncome'])->name('incomes.destroy');


Route::resource('expenses', ExpenseController::class)->only([
    'store', 'destroy'
])->names([
    'store' => 'expenses.store',
    'destroy' => 'expenses.destroy'
]);

Route::resource('categories', CategoryController::class)->only([
    'store', 'destroy'
])->names([
    'store' => 'categories.store',
    'destroy' => 'categories.destroy'
]);

Route::resource('history', HistoryController::class)->only([
    'index'
])->names([
    'index' => 'history.index'
]);
