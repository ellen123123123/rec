<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('earn');
    }

    public function create()
    {
        $categories = Category::all();
        return view('expense', compact('categories'));
    }

    public function store(Request $request)
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
        return redirect('/')->with('success', 'Gasto adicionado com sucesso!');
    }
}
