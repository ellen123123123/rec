<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;

class HistoryController extends Controller
{
    public function expenses()
    {
        $expenses = Expense::with('category')->get();

        return view('history', compact('expenses'));
    }
}
