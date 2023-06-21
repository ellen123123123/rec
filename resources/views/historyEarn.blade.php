<!DOCTYPE html>
<html>
<head>
    <title>Histórico de Ganhos</title>
</head>
<body>
    <h1>Histórico de Ganhos</h1>

    @foreach($incomes as $income)
        <div>
            <p><strong>Nome do Ganho:</strong> {{ $income->income_name }}</p>
            <p><strong>Data do Ganho:</strong> {{ $income->income_date }}</p>
            <p><strong>Categoria:</strong> {{ $income->category->category_name }}</p>
            <p><strong>Cor da Categoria:</strong> {{ $income->category->color }}</p>
        </div>
        <hr>
    @endforeach
</body>
</html>
