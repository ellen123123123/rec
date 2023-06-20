<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Gasto</title>
    <style>
        .category-option {
            display: flex;
            align-items: center;
        }

        .category-color {
            width: 15px;
            height: 15px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <a href="/">Voltar</a> <!-- Botão para voltar à página principal -->

    <h1>Criar Gasto</h1>

    <form method="POST" action="{{ url('/expenses/store') }}">
        @csrf

        <label for="category">Categoria:</label>
        <select id="category" name="category">
            <option value="">Selecione uma categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" data-color="{{ $category->color }}">
                    <span class="category-option">
                        <span class="category-color" style="background-color: {{ $category->color }}"></span>
                        {{ $category->category_name }}
                    </span>
                </option>
            @endforeach
        </select>

        <br><br>

        <a href="/manage-categories">Gerenciar Categorias</a> 

        <br><br>

        <label for="expense_date">Data:</label>
        <input type="date" id="expense_date" name="expense_date">

        <br><br>

        <label for="expense_name">Nome do Gasto:</label>
        <input type="text" id="expense_name" name="expense_name">

        <br><br>

        <button type="submit">Adicionar Gasto</button>
    </form>
</body>
</html>