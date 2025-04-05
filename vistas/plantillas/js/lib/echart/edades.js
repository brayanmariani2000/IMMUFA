$(document).ready(function() {
            $.ajax({
                url: 'ajax/edadesAjax.php',
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        $('#edades').html('<div style="color:red">Error: ' + data.error + '</div>');
                        return;
                    }
                    
                    // Inicializar el gráfico
                    const chartDom = document.getElementById('edades');
                    const myChart = echarts.init(chartDom);
                    
                    // Opciones del gráfico de barras verticales
                    const option = {
                        title: {
                            text: 'Pacientes por Rango de Edad',
                            subtext: 'Distribución por grupos etarios',
                            left: 'center'
                        },
                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'shadow'
                            },
                            formatter: '{b}: {c} pacientes'
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },
                        xAxis: {
                            type: 'category',
                            data: data.rangos,
                            axisLabel: {
                                rotate: 30, // Rotar etiquetas si son largas
                                interval: 0 // Mostrar todas las etiquetas
                            }
                        },
                        yAxis: {
                            type: 'value',
                            name: 'Cantidad de Pacientes',
                            axisLabel: {
                                formatter: '{value}'
                            }
                        },
                        series: [{
                            name: 'Pacientes',
                            type: 'bar',
                            data: data.rangos.map((rango, index) => ({
                                value: data.cantidades[index],
                                name: rango,
                                itemStyle: {
                                    color: data.colores[index]
                                }
                            })),
                            label: {
                                show: true,
                                position: 'top',
                                formatter: '{c}'
                            },
                            emphasis: {
                                itemStyle: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            }
                        }]
                    };
                    
                    // Aplicar las opciones
                    myChart.setOption(option);
                    
                    // Redimensionar al cambiar el tamaño de la ventana
                    window.addEventListener('resize', function() {
                        myChart.resize();
                    });
                },
                error: function(xhr, status, error) {
                    $('#edades').html('<div style="color:red">Error al cargar datos: ' + error + '</div>');
                }
            });
        });

