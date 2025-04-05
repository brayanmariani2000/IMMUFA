$(document).ready(function() {
        $.ajax({
            url: 'ajax/generoAjax.php',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.error) {
                    $('#basic-Pie').html('<div style="color:red">Error: ' + data.error + '</div>');
                    return;
                }
                
                // Inicializar el gráfico
                const chartDom = document.getElementById('basic-Pie');
                const myChart = echarts.init(chartDom);
                
                // Opciones del gráfico (versión Pie)
                const option = {
                    title: {
                        text: 'Distribución por Generos',
                        subtext: 'Total de pacientes',
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'item',
                        formatter: '{a} <br/>{b}: {c} ({d}%)'
                    },
                    legend: {
                        orient: 'vertical',
                        left: 'left',
                        data: data.generos
                    },
                    series: [
                        {
                            name: 'Distribución por Sexo',
                            type: 'pie',
                            radius: '70%',
                            center: ['50%', '60%'],
                            data: data.generos.map((genero, index) => ({
                                value: data.cantidades[index],
                                name: genero,
                                itemStyle: { color: data.colores[index] }
                            })),
                            emphasis: {
                                itemStyle: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            },
                            label: {
                                show: true,
                                formatter: '{b}: {c} ({d}%)'
                            }
                        }
                    ]
                };
                
                // Aplicar las opciones
                myChart.setOption(option);
                
                // Redimensionar al cambiar el tamaño de la ventana
                window.addEventListener('resize', function() {
                    myChart.resize();
                });
            },
            error: function(xhr, status, error) {
                $('#chart-container').html('<div style="color:red">Error al cargar datos: ' + error + '</div>');
            }
        });

});
