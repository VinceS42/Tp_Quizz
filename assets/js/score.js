function createTopPlayersChart() {
    const canvasTopBarChart = document.querySelector('#topBarChart');
    const allPlayersLine = document.querySelectorAll('tr.playerLine');

    let chartLabels = [];
    let chartDatas = [];
    const plugin = {
      id: 'customCanvasBackgroundColor',
      beforeDraw: (chart, args, options) => {
        const {ctx} = chart;
        ctx.save();
        ctx.globalCompositeOperation = 'destination-over';
        ctx.fillStyle = options.color || '#99ffff';
        ctx.fillRect(0, 0, chart.width, chart.height);
        ctx.restore();
      }
    };    

    if (allPlayersLine.length > 0) {
        allPlayersLine.forEach(player => {
            chartLabels.push(player.dataset.user);
            chartDatas.push(player.dataset.score);
        });

        const config = {
          type: 'bar',
          data: {
              labels: chartLabels,
              datasets: [{
                  label: 'Top 5',
                  data: chartDatas
              }]
          },
          options: {
            responsive: true,
            plugins: {
              customCanvasBackgroundColor: {
                color: 'rgba(255, 255, 255)',
              },
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Top 5 joueurs'
              }
            }
          },
          plugins: [plugin],
        };

        new Chart(canvasTopBarChart, config);
    } else {
        const config = {
          type: 'bar',
          data: {
              labels: chartLabels,
              datasets: [{
                  label: 'Aucun Top 5',
                  data: chartDatas
              }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Top 5 joueurs'
              }
            }
          }
        };

        new Chart(canvasTopBarChart, config);
    }
}

if (document.URL.indexOf('score.php') > -1) {
    createTopPlayersChart();
}
