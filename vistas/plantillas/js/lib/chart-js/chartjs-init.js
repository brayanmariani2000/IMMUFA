(function($) {
    "use strict";
    
    $(document).ready(function() {
        var ctx = document.getElementById("barrasChart");
        
        // Mostrar mensaje de carga
        $(ctx).after('<div class="chart-loading">Cargando datos...</div>');
        
        $.ajax({
            url: 'ajax/edadesAjax.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('.chart-loading').remove();
                
                if (response.error) {
                    $(ctx).after('<div class="chart-error">Error: ' + response.error + '</div>');
                    return;
                }
                
                if (!response.labels || !response.data) {
                    $(ctx).after('<div class="chart-error">Formato de datos incorrecto</div>');
                    return;
                }
                
                // Array de colores para cada barra (puedes personalizarlos)
                var colores = [
                    'rgba(255, 99, 132, 0.8)',  // 0-1 años
                    'rgba(54, 162, 235, 0.8)',   // 2-5 años
                    'rgba(255, 206, 86, 0.8)',   // 6-12 años
                    'rgba(75, 192, 192, 0.8)',   // 13-19 años
                    'rgba(153, 102, 255, 0.8)',  // 20-34 años
                    'rgba(255, 159, 64, 0.8)',   // 35-59 años
                    'rgba(199, 199, 199, 0.8)'   // 60+ años
                ];
                
                // Preparar los datos con colores individuales
                var dataset = {
                    label: "Cantidad de Pacientes por Edad",
                    data: response.data,
                    backgroundColor: [],
                    borderColor: [],
                    borderWidth: 1,
                    barThickness: 5,
                    maxBarThickness: 5
                };
                
                // Asignar colores a cada barra
                response.data.forEach(function(item, index) {
                    var colorIndex = index % colores.length;
                    dataset.backgroundColor.push(colores[colorIndex]);
                    dataset.borderColor.push(colores[colorIndex].replace('0.8', '1'));
                });
                
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: response.labels,
                        datasets: [dataset]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    autoSkip: false
                                }
                            }]
                        },
                        legend: {
                            display: false // Ocultamos la leyenda porque usamos colores diferentes
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return response.labels[tooltipItem.index] + ': ' + tooltipItem.yLabel;
                                }
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                $('.chart-loading').remove();
                $(ctx).after('<div class="chart-error">Error al cargar datos: ' + error + '</div>');
            }
        });
    });
    
})(jQuery);