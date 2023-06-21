<!DOCTYPE html>
<html>
<head>
    <title>Histórico de Despesas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .expense-item {
            background-color: #fff;
            border: solid 2px #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .expense-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .expense-info {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .category-label {
            font-weight: bold;
            display: inline-block;
            min-width: 150px;
        }

        .category-color {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 5px;
            border-radius: 3px;
            vertical-align: middle;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
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
            margin-left: 10px; /* Adicionado margem à esquerda */
        }

        a.back-button:hover {
            background-color: #cc0052; /* Darker Magenta */
        }

        form.delete-form {
            display: inline-block;
        }

        button.delete-button {
            background-color: #ff0066; /* Magenta */
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        button.delete-button:hover {
            background-color: #ff0066; /* Darker Magenta */
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 20px;
                margin-bottom: 10px;
            }

            .expense-item {
                padding: 10px;
            }

            .expense-name {
                font-size: 16px;
                margin-bottom: 5px;
            }

            .expense-info {
                font-size: 14px;
                margin-bottom: 3px;
            }

            .category-label {
                min-width: 120px;
            }

            .category-color {
                width: 15px;
                height: 15px;
                margin-right: 3px;
            }

            hr {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <a href="/" class="back-button">Voltar</a>
    <div class="container">
        <h1>Histórico de Despesas</h1>

        @foreach($expenses as $expense)
            <div class="expense-item">
                <p class="expense-name">{{ $expense->expense_name }}</p>
                <p class="expense-info">
                    <span class="category-label">Valor:</span> R$ {{ $expense->amount }}
                </p>
                <p class="expense-info">
                    <span class="category-label">Data da Despesa:</span> {{ $expense->expense_date }}
                </p>
                <p class="expense-info">
                    <span class="category-label">Categoria:</span> {{ $expense->category->category_name }}
                    <span class="category-color" style="background-color:{{ $expense->category->color }}"></span>
                </p>
                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">Excluir</button>
                </form>
            </div>
            <hr>
        @endforeach
    </div>
</body>
</html>
