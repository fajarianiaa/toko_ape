<?php
    foreach($pesanan as $pesanan){
        $jumlah_transaksi[]  = $pesanan->jumlah_transaksi;
        $jumlah_bayar[]   = $pesanan->jumlah_bayar;
    }
    echo json_encode($jumlah_transaksi);
    echo json_encode($jumlah_bayar);
?>

<canvas id="myChart" width="400" height="100"></canvas>

<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($jumlah_transaksi);?>,
        datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($jumlah_bayar);?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>