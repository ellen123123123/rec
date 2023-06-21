<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ganho</title>
</head>
<body>
    <a href="/">Voltar</a> <!-- Botão para voltar à página principal -->

    <h1>Criar Ganho</h1>

    <form method="POST" action="{{ url('/incomes/store') }}">
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

        <label for="income_date">Data:</label>
        <input type="date" id="income_date" name="income_date">

        <br><br>

        <label for="income_name">Nome do Ganho:</label>
        <input type="text" id="income_name" name="income_name">

        <br><br>

        <button type="submit">Adicionar Ganho</button>
    </form>

</body>
</html>
