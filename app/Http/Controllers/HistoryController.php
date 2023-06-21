<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;

class HistoryController extends Controller
{
    public function earns()
    {
        $incomes = Income::orderBy('income_date', 'desc')->get();
        return view('historyEarn', compact('incomes'));
    }

    public function expenses()
    {
        $expenses = Expense::orderBy('expense_date', 'desc')->get();
        return view('historyExpense', compact('expenses'));
    }
    
    public function destroyIncome($income)
    {
        // Encontre o ganho pelo ID e exclua-o
        $income = Income::findOrFail($income);
        $income->delete();

        // Redirecionar para a página de histórico de ganhos ou exibir uma mensagem de sucesso
        return redirect()->route('historic.ganhos')->with('success', 'Ganho excluído com sucesso!');
    }
}
