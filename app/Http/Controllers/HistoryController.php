<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;

class HistoryController extends Controller
{
    public function earns()
    {
        $incomes = Income::all();
        return view('historyEarn', compact('incomes'));
    }

    public function expenses()
    {
        $expenses = Expense::all();
        return view('historyExpense', compact('expenses'));
    }
}
