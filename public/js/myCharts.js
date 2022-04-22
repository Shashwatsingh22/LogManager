const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(248, 165, 48)',
      borderColor: 'rgb(248, 165, 48)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }],

  };
  const config = {
    type: 'line',
    data: data,
    options: {

      indexAxis: 'y',
      scales: {
        x: {
          beginAtZero: true
        }
      }
    }
  };
  const ctx=document.getElementById('myChart');
const myChart = new Chart(
    ctx,
    config
  );
