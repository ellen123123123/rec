<!DOCTYPE html>
<html>
<head>
    <title>Histórico de Despesas</title>
</head>
<body>
    <h1>Histórico de Despesas</h1>

    @foreach($expenses as $expense)
        <div>
            <p><strong>Nome da Despesa:</strong> {{ $expense->expense_name }}</p>
            <p><strong>Data da Despesa:</strong> {{ $expense->expense_date }}</p>
            <p><strong>Categoria:</strong> {{ $expense->category->category_name }}</p>
            <p><strong>Cor da Categoria:</strong> {{ $expense->category->color }}</p>
        </div>
        <hr>
    @endforeach
</body>
</html>
