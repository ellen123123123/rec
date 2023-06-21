<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
      }

      main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #fff;
        border: solid 2px #ccc;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 90%;
        margin: 0 auto;
      }

      h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
      }

      label {
        font-size: 18px;
        font-weight: bold;
        color: #555;
      }

      #chartCanvas {
        max-width: 400px;
        max-height: 300px;
        margin-bottom: 40px;
      }

      .button-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
      }

      .button-container button {
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        margin-right: 10px;
        transition: background-color 0.3s ease;
        outline: none;
      }

      .button-container button.spent {
        background-color: #ff0066; /* Magenta */
        color: #fff;
      }

      .button-container button.earn {
        background-color: #00b3b3; /* Cyan */
        color: #fff;
      }

      .button-container button:hover {
        background-color: #cc0052; /* Darker Magenta */
      }

      .button-container button:last-child {
        margin-right: 0;
      }

      .history-button-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }

      .history-button-container button {
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        border: none;
        background-color: #f5f5f5;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s ease;
        outline: none;
      }

      .history-button-container button:hover {
        background-color: #e5e5e5;
      }

      .history-button-container button:first-child {
        margin-right: 10px;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <main>
    <h1>Saldo:</h1>
    <label>R$ {{ $saldo }}</label>

    <canvas id="chartCanvas"></canvas>

    <div class="button-container">
      <button onclick="window.location.href='/expense'" class="spent">Adicionar gasto</button>
      <button onclick="window.location.href='/earn'" class="earn">Adicionar ganho</button>
    </div>

    <div class="history-button-container">
      <button onclick="window.location.href = '/historico/despesas'">Histórico de Despesas</button>
      <button onclick="window.location.href = '/historico/ganhos'">Histórico de Ganhos</button>
    </div>
  </main>

  <script>
    // Obter a referência do elemento <canvas>
    const chartCanvas = document.getElementById('chartCanvas');

    // Criação do gráfico
    const chart = new Chart(chartCanvas, {
      type: 'pie',
      data: {
        labels: [@foreach($categories as $category) '{{ $category->category_name }}', @endforeach],
        datasets: [{
          data: [@foreach($categories as $category) {{ $category->total_expenses }}, @endforeach],
          backgroundColor: [@foreach($categories as $category) '{{ $category->color }}', @endforeach]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>

</body>
</html>
