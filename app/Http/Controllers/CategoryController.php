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
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        $category = new Category();
        $category->category_name = $validatedData['category_name'];
        $category->color = $validatedData['color'];
        $category->save();

        return redirect('/manage-categories')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/manage-categories')->with('success', 'Categoria excluída com sucesso!');
    }
}
