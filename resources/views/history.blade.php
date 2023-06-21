<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
</head>
<body>
    <a href="/">Voltar</a> <!-- Botão para voltar à página principal -->

    <h1>Histórico</h1>

    <table>
        <tr>
            <th>Categoria</th>
            <th>Data</th>
            <th>Descrição</th>
        </tr>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction['category']->category_name }}</td>
                <td>{{ $transaction['transaction_date'] }}</td>
                <td>{{ $transaction['transaction_name'] }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
