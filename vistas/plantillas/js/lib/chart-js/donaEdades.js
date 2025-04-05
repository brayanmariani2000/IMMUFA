$(document).ready(function() {
    var ctx = document.getElementById("donutChart");
    var donutChart = null;
    
    // Colores estilo Dunus para cada grupo de edad
    var colores = [
        'rgba(255, 99, 132, 0.7)',  // 0-1 años
        'rgba(54, 162, 235, 0.7)',   // 2-5 años
        'rgba(255, 206, 86, 0.7)',   // 6-12 años
        'rgba(75, 192, 192, 0.7)',   // 13-19 años
        'rgba(153, 102, 255, 0.7)',  // 20-34 años
        'rgba(255, 159, 64, 0.7)',   // 35-59 años
        'rgba(199, 199, 199, 0.7)'   // 60+ años
    ];
    
    // Función para cargar datos
    function loadChartData() {
        $('#chartLoading').show();
        $('#chartError').hide();
        $('#refreshBtn').prop('disabled', true);
        
        $.ajax({
            url: 'ajax/edadesAjax.php', // Misma URL que en tu ejemplo original
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#chartLoading').hide();
                
                if (response.error) {
                    $('#chartError').text('Error: ' + response.error).show();
                    return;
                }
                
                if (!response.labels || !response.data) {
                    $('#chartError').text('Formato de datos incorrecto').show();
                    return;
                }
                
                createDonutChart(response.labels, response.data);
            },
            error: function(xhr, status, error) {
                $('#chartLoading').hide();
                $('#chartError').text('Error al cargar datos: ' + error).show();
                console.error("Error en AJAX:", error);
            },
            complete: function() {
                $('#refreshBtn').prop('disabled', false);
            }
        });
    }
    
    // Función para crear el gráfico de dona
    function createDonutChart(labels, data) {
        // Destruir gráfico anterior si existe
        if (donutChart) {
            donutChart.destroy();
        }
        
        // Preparar colores para cada segmento
        var backgroundColors = [];
        var hoverColors = [];
        
        data.forEach(function(item, index) {
            var colorIndex = index % colores.length;
            backgroundColors.push(colores[colorIndex]);
            hoverColors.push(colores[colorIndex].replace('0.7', '0.9'));
        });
        
        donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: 'rgba(255, 255, 255, 0.8)',
                    borderWidth: 2,
                    hoverBackgroundColor: hoverColors,
                    hoverBorderWidth: 3,
                    borderRadius: 8, // Bordes redondeados en segmentos
                    hoverOffset: 15 // Efecto hover
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        bodyFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribución por Edades',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                        padding: {
                            top: 10,
                            bottom: 20
                        }
                    }
                },
                cutout: '65%', // Grosor del donut
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    }
    
    // Evento para el botón de actualización
    $('#refreshBtn').on('click', function() {
        $(this).html('<i class="fa fa-refresh fa-spin"></i> Actualizando...');
        loadChartData();
        setTimeout(() => {
            $(this).html('Actualizar Datos');
        }, 1000);
    });
    
    // Cargar datos iniciales
    loadChartData();
    
    // Redimensionar al cambiar tamaño de ventana
    $(window).on('resize', function() {
        if (donutChart) {
            donutChart.resize();
        }
    });
});
