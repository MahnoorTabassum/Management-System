<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weekly Report Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .report-container {
      width: 990px;
      background-color: #FEFAF6;
      color: black;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .report-header {
      display: flex;
      justify-content: space-between;
      font-size: 18px;
      font-weight: bold;
    }

    .chart-container {
      position: relative;
      margin: 20px auto;
      width: 100%;
      height: 300px; /* Increase the height here if needed */
    }

    .legend {
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    .legend div {
      margin: 0 10px;
      display: flex;
      align-items: center;
    }

    .legend div span {
      width: 12px;
      height: 12px;
      display: inline-block;
      margin-right: 5px;
      border-radius: 50%;
    }

    .legend .views {
      background-color: #9f5f9f;
    }

    .legend .purchases {
      background-color: #8ea8d3;
    }
  </style>
</head>
<body>
  <div class="report-container">
    <div class="report-header">
      <h1><div>Weekly report</div></h1>
      <div>Revenue<br><span style="font-size: 24px;">3621.79</span></div>
    </div>
    <div style="font-size: 14px;">01. Feb - 07. Feb</div>
    <div class="chart-container">
      <canvas id="weeklyReportChart"></canvas>
    </div>
    <div class="legend">
      <div><span class="views"></span> Views</div>
      <div><span class="purchases"></span> Purchases</div>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('weeklyReportChart').getContext('2d');
    const weeklyReportChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
          {
            label: 'Views',
            data: [100, 200, 150, 220, 180, 190, 210],
            borderColor: '#9f5f9f',
            backgroundColor: 'rgba(159, 95, 159, 0.2)',
            borderWidth: 2,
            fill: true
          },
          {
            label: 'Purchases',
            data: [80, 130, 100, 160, 120, 130, 140],
            borderColor: '#8ea8d3',
            backgroundColor: 'rgba(142, 168, 211, 0.2)',
            borderWidth: 2,
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              color: 'rgba(255, 255, 255, 0.1)'
            }
          }
        }
      }
    });
  </script>
</body>
</html>
