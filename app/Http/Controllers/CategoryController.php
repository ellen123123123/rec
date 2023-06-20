<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('manage-categories', compact('categories'));
    }

    public function store(Request $request)
    {
        // Valide os dados recebidos do formulário
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        // Crie uma nova categoria
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->color = $request->color;
        $category->save();

        // Redirecionar para a página de gerenciamento de categorias ou exibir uma mensagem de sucesso
        return redirect('/manage-categories')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function destroy($id)
    {
        // Encontre a categoria pelo ID e exclua-a
        $category = Category::findOrFail($id);
        $category->delete();

        // Redirecionar para a página de gerenciamento de categorias ou exibir uma mensagem de sucesso
        return redirect('/manage-categories')->with('success', 'Categoria excluída com sucesso!');
    }
}
