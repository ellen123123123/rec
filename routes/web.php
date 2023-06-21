<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExpenseController::class, 'index']);
Route::get('/earn', [ExpenseController::class, 'earn']);
Route::get('/expense', [ExpenseController::class, 'expense']);
Route::post('/incomes/store', [ExpenseController::class, 'storeIncome']);
Route::post('/expenses/store', [ExpenseController::class, 'storeExpense']);

Route::get('/manage-categories', [CategoryController::class, 'index']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/historico/ganhos', [HistoryController::class, 'earns']);
Route::get('/historico/despesas', [HistoryController::class, 'expenses']);

