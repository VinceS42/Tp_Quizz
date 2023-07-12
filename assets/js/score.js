function createTopPlayersChart() {
    const canvasTopBarChart = document.querySelector('#topBarChart');
    const allPlayersLine = document.querySelectorAll('tr.playerLine');

    let chartLabels = [];
    let chartDatas = [];

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

createTopPlayersChart();
