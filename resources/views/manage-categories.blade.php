<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Categorias</title>
</head>
<body>
    <a href="/">Voltar</a> <!-- Botão para voltar à página principal -->

    <h1>Gerenciar Categorias</h1>

    <form method="POST" action="/categories/store">
        @csrf

        <label for="category_name">Nome da Categoria:</label>
        <input type="text" id="category_name" name="category_name">

        <br><br>

        <label for="color">Cor:</label>
        <input type="color" id="color" name="color">

        <br><br>

        <button type="submit">Adicionar Categoria</button>
    </form>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>Nome da Categoria</th>
                <th>Cor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <div style="width: 20px; height: 20px; background-color: {{ $category->color }}"></div>
                    </td>
                    <td>
                        <form method="POST" action="/categories/{{ $category->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
