// script.js
document.addEventListener('DOMContentLoaded', function () {
    // Ambil data dari PHP menggunakan AJAX
    fetch('data.php')
        .then(response => response.json())
        .then(data => {
            // Gambar chart menggunakan Chart.js
            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
                    datasets: [{
                        label: 'Bar Chart Example',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});
