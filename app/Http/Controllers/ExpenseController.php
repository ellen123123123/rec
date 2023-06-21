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
    
    public function historico()
    {
        // Recupere os gastos e ganhos do banco de dados (variáveis demo)
        $expenses = Expense::all();
        $incomes = Income::all();

        return view('historico', compact('expenses', 'incomes'));
    }
}
