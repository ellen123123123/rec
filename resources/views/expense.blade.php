<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Despesa</title>
</head>
<body>
    <a href="/">Voltar</a> <!-- Botão para voltar à página principal -->

    <h1>Criar Despesa</h1>

    <form method="POST" action="{{ url('/expenses/store') }}">
        @csrf

        <label for="category">Categoria:</label>
        <select id="category" name="category">
            <option value="">Selecione uma categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>

        <br><br>

        <a href="/manage-categories">Gerenciar Categorias</a> 

        <br><br>

        <label for="expense_date">Data:</label>
        <input type="date" id="expense_date" name="expense_date">

        <br><br>

        <label for="expense_name">Nome da Despesa:</label>
        <input type="text" id="expense_name" name="expense_name">

        <br><br>

        <label for="amount">Valor:</label>
        <input type="number" id="amount" name="amount">

        <br><br>

        <button type="submit">Adicionar Despesa</button>
    </form>

</body>
</html>
