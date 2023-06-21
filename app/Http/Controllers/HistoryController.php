<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;

class HistoryController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        $incomes = Income::all();

        $transactions = $expenses->concat($incomes);

        return view('history', compact('transactions'));
    }
}
