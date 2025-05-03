// assets/js/graficaDependencias.js
$(document).ready(function() {
    var ctx = document.getElementById("donutChartDependencias");
    var donutChart = null;

    // Colores estilo Donut para cada dependencia
    var colores = [
        'rgba(255, 99, 132, 0.7)',  // GOBERNACION
        'rgba(54, 162, 235, 0.7)',   // PSUV
        'rgba(255, 206, 86, 0.7)',   // COMUNIDAD
        'rgba(75, 192, 192, 0.7)',   // ALIANZAS
        'rgba(153, 102, 255, 0.7)',  // SATIUSUM
        'rgba(255, 159, 64, 0.7)',   // Extra 1
        'rgba(199, 199, 199, 0.7)'   // Extra 2
    ];
    
    // Función para cargar datos
    function loadChartData() {
        $('#chartLoading').show();
        $('#chartError').hide();
        
        // Definir los parámetros de la petición
        var area_consulta = {
            accion: 'obtener_dependencias', // Ajusta este parámetro según lo necesites
            // otros parámetros que necesite tu endpoint
        };
        
        $.post(`ajax/ajxaChartDonusDependecias.php`, area_consulta, function(response) {
            $('#chartLoading').hide();
            
            try {
                // Verificar si la respuesta es un string (necesita parseo)
                var data = typeof response === 'string' ? JSON.parse(response) : response;
                
                if (data.error) {
                    $('#chartError').text('Error: ' + data.error).show();
                    return;
                }
                
                if (!data.labels || !data.data) {
                    $('#chartError').text('Formato de datos incorrecto').show();
                    return;
                }
                
                createDonutChart(data.labels, data.data);
                
            } catch (e) {
                $('#chartError').text('Error al procesar los datos: ' + e.message).show();
                console.error("Error parsing response:", e);
            }
        }, 'json').fail(function(xhr, status, error) {
            $('#chartLoading').hide();
            var errorMsg = xhr.responseJSON && xhr.responseJSON.error ? 
                xhr.responseJSON.error : error;
            $('#chartError').text('Error al cargar datos: ' + errorMsg).show();
            console.error("Error en POST:", errorMsg);
        });
    }
    
    // Función para crear el gráfico de dona (igual que antes)
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
                    borderRadius: 8,
                    hoverOffset: 15
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
                        text: 'Citas por Dependencia',
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
                cutout: '65%',
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    }
    
    // Redimensionar al cambiar tamaño de ventana
    $(window).on('resize', function() {
        if (donutChart) {
            donutChart.resize();
        }
    });
    
    // Cargar datos iniciales
    loadChartData();
});