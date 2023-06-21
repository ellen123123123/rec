<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExpenseController::class, 'index']);
Route::get('/earn', [ExpenseController::class, 'earn']);
Route::get('/expense', [ExpenseController::class, 'create']);
Route::post('/incomes/store', [ExpenseController::class, 'store']);

Route::get('/expenses/create', [ExpenseController::class, 'create']);
Route::post('/expenses/store', [ExpenseController::class, 'store']);
Route::get('/manage-categories', [CategoryController::class, 'index']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/historico', [HistoryController::class, 'index'])->name('history');



