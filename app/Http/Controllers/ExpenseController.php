<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function earn()
    {
        $categories = Category::all();
        return view('earn', compact('categories'));
    }
    public function expense()
    {
        $categories = Category::all();
        return view('expense', compact('categories'));
    }
/*
    public function create()
    {
        $categories = Category::all();
        return view('expense', compact('categories'));
    }*/

    public function storeIncome(Request $request)
    {
        // Valide os dados recebidos do formulário
        $validatedData = $request->validate([
            'category' => 'required',
            'income_date' => 'required|date',
            'income_name' => 'required|string|max:255',
        ]);

        // Processar e salvar os dados do formulário aqui
        $income = new Income();
        $income->category_id = $request->category;
        $income->income_date = $request->income_date;
        $income->income_name = $request->income_name;
        $income->save();

        // Redirecionar para a página principal ou exibir uma mensagem de sucesso
        return redirect('/')->with('success', 'Ganho adicionado com sucesso!');
    }
    public function storeExpense(Request $request)
    {
        // Valide os dados recebidos do formulário
        $validatedData = $request->validate([
            'category' => 'required',
            'expense_date' => 'required|date',
            'expense_name' => 'required|string|max:255',
        ]);

        // Processar e salvar os dados do formulário aqui
        $expense = new Expense();
        $expense->category_id = $request->category;
        $expense->expense_date = $request->expense_date;
        $expense->expense_name = $request->expense_name;
        $expense->save();

        // Redirecionar para a página principal ou exibir uma mensagem de sucesso
        return redirect('/')->with('success', 'Despesa adicionada com sucesso!');
    }

}
