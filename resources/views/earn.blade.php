<?php
// Variáveis e arrays demo
$categories = [
    (object) ['id' => 1, 'category_name' => 'Categoria 1'],
    (object) ['id' => 2, 'category_name' => 'Categoria 2'],
    (object) ['id' => 3, 'category_name' => 'Categoria 3']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Gasto</title>
</head>
<body>
    <a href="/">Voltar</a> <!-- Botão para voltar à página principal -->

    <h1>Criar Gasto</h1>

    <form method="POST" action="processar-gasto.php">
        @csrf

        <label for="category">Categoria:</label>
        <select id="category" name="category">
            <option value="">Selecione uma categoria</option>
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
            <?php endforeach; ?>
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
