<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Categorias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        a {
            display: inline-block;
            margin: 20px 0;
            color: #fff;
            text-decoration: none;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a.back-button {
            background-color: #ff0066; /* Magenta */
        }

        a.back-button:hover {
            background-color: #cc0052; /* Darker Magenta */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="color"] {
            padding: 5px;
            border-radius: 3px;
            border: solid 1px #ccc;
            margin-bottom: 10px;
            width: 20;
            height: 50px;;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #ff0066; /* Magenta */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
            height: 50px;;
        }

        button[type="submit"]:hover {
            background-color: #cc0052; /* Darker Magenta */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #00cccc; /* Cyan */
            color: #fff;
        }

        td div {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <a href="/" class="back-button">Voltar</a>
    <div class="container">
        <h1>Gerenciar Categorias</h1>

        <form method="POST" action="/categories/store">
            @csrf

            <label for="category_name">Nome da Categoria:</label>
            <input type="text" id="category_name" name="category_name">

            <br><br>

            <label for="color">Cor:</label>
            <input type="color" id="color" name="color">

            <br><br>

            <button type="submit" style="width:40%">Adicionar Categoria</button>
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
                            <div style="background-color: {{ $category->color }}"></div>
                        </td>
                        <td>
                            <form method="POST" action="/categories/{{ $category->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #ff0066; color: #fff;">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
