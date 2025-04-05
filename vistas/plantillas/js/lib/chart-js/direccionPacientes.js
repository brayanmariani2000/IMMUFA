    $(document).ready(function() {
        // Ocultar canvas inicialmente
        $('#pieChart').hide();
        
        // Hacer la petición AJAX
        $.ajax({
            url: 'ajax/chartDirecciones.php',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.error) {
                    $('.loading').html('<div style="color:red">Error: ' + data.error + '</div>');
                    return;
                }
                
                // Ocultar mensaje de carga
                $('.loading').hide();
                
                // Mostrar canvas
                $('#pieChart').show();
                
                // Crear el gráfico de pie
                const ctx = document.getElementById('pieChart').getContext('2d');
                const pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false, // Ocultamos la leyenda por defecto
                                position: 'right'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = Math.round((value / total) * 100);
                                        return `${label}: ${value} pacientes (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
                
                // Crear leyenda personalizada
                createCustomLegend(data);
            },
            error: function(xhr, status, error) {
                $('.loading').html('<div style="color:red">Error al cargar los datos: ' + error + '</div>');
            }
        });
        
        // Función para crear leyenda personalizada
        function createCustomLegend(data) {
            let legendHtml = '<ul>';
            const total = data.datasets[0].data.reduce((a, b) => a + b, 0);
            
            data.labels.forEach((label, i) => {
                const value = data.datasets[0].data[i];
                const percentage = Math.round((value / total) * 100);
                const color = data.datasets[0].backgroundColor[i];
                
                legendHtml += `
                    <li>
                        <span class="legend-color" style="background-color:${color};"></span>
                        ${label}: ${value} (${percentage}%)
                    </li>
                `;
            });
            
            legendHtml += '</ul>';
            $('#chartLegend').html(legendHtml);
        }
    });
