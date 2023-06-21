<!-- history.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Gastos</title>
</head>
<body>
    <h1>Histórico de Gastos</h1>

    <ul>
        @foreach ($expenses as $expense)
            <li>
                <strong>Data:</strong> {{ $expense->expense_date }}<br>
                <strong>Descrição:</strong> {{ $expense->expense_name }}<br>
                <strong>Categoria:</strong> {{ $expense->category->category_name }}
            </li>
        @endforeach
    </ul>
</body>
</html>
