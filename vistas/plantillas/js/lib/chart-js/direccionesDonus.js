$(document).ready(function() {
    $.ajax({
        url: 'ajax/ajaxChartDonusdireccion.php',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            var ctx = document.getElementById('donutChartMunicipios').getContext('2d');
            var myDonutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 20,
                            fontColor: '#333',
                            fontFamily: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
                            fontSize: 12
                        }
                    },
                    cutoutPercentage: 60,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.labels[tooltipItem.index] || '';
                                var value = data.datasets[0].data[tooltipItem.index];
                                var total = data.datasets[0].data.reduce((a, b) => a + b, 0);
                                var percentage = Math.round((value / total) * 100);
                                return label + ': ' + percentage + '%';
                            }
                        }
                    }
                }
            });
        },
       
    });
});