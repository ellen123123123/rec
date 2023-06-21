<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body {
        background-color: #ddd;
      }

      main {
        margin: auto;
        width: 500px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        background-color: white;
        border: solid 2px #888;
        border-radius: 10px;
        padding: 20px;
      }
      
      canvas {
        max-width: 60%;
        max-height: 70%
      }
      .grapg{
        height: 500px;
      }
      .spent{
        background-color:crimson
      }
      .earn{
        background-color: greenyellow
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <main>
    <h1>Saldo:</h1>
    <label>R$ {{ $saldo }}</label>


    <canvas id="chartCanvas"></canvas>
    <div>
      <button onclick="window.location.href='/expense'" class="spent">Adicionar gasto</button>
      <button onclick="window.location.href='/earn'" class="earn">Adicionar ganho</button>
    </div>
    

    <button onclick="window.location.href = '/historico/despesas'">Histórico de Perdas</button>
    <button onclick="window.location.href = '/historico/ganhos'">Histórico de Ganhos</button>
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
