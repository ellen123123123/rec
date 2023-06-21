<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Despesa</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f5f5f5;
          margin: 0;
          padding: 0;
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
          background-color: #cc0052; /* Magenta */
          margin-left: 10px; /* Adicionado margem à esquerda */
        }
  
        a.back-button:hover {
          background-color: #cc0052; /* Darker Magenta */
        }
  
        h1 {
          font-size: 24px;
          margin: 20px 0;
          text-align: center;
          color: #333;
        }
  
        form {
          max-width: 400px;
          margin: 0 auto;
          background-color: #fff;
          border: solid 2px #ccc;
          border-radius: 10px;
          padding: 20px;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
  
        label {
          display: block;
          font-size: 18px;
          font-weight: bold;
          color: #555;
          margin-bottom: 10px;
        }
  
        select,
        input[type="date"],
        input[type="text"],
        input[type="number"] {
          width: 100%;
          padding: 10px;
          font-size: 16px;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin-bottom: 10px;
        }
  
        button[type="submit"] {
          display: block;
          width: 100%;
          padding: 12px 24px;
          font-size: 16px;
          font-weight: bold;
          text-transform: uppercase;
          border: none;
          border-radius: 30px;
          cursor: pointer;
          background-color: #cc0052; /* Magenta */
          color: #fff;
          transition: background-color 0.3s ease;
          outline: none;
        }
  
        button[type="submit"]:hover {
          background-color: #cc0052; /* Darker Magenta */
        }
        
        a.link {
          display: block;
          margin: 20px 0;
          text-align: center;
          color: #333;
          text-decoration: underline;
        }
  
        a.link:hover {
          color: #cc0052; /* Magenta */
        }
      </style>
</head>
<body>
    <a href="/" class="back-button">Voltar</a> <!-- Botão para voltar à página principal -->

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



        <a class="link" href="/manage-categories">Gerenciar Categorias</a> 



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
