<?php
foreach ($penjualan as $key => $value) {
    $thn[] = $value['tahun'];
    $jml[] = $value['jumlah'];
}
?>

<canvas id="myChart" height="100"></canvas>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($thn) ?>,
            datasets: [{
                label: 'Grafik Penjualan',
                data: <?= json_encode($jml) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.90)',
                    'rgba(54, 162, 235, 0.90)',
                    'rgba(255, 206, 86, 0.90)',
                    'rgba(75, 192, 192, 0.90)',
                    'rgba(153, 102, 255, 0.90)',
                    'rgba(255, 159, 64, 0.90)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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
</script>