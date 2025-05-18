$(document).ready(function() {
    cargarGraficoDiscapacidadDonut();
    
    // Opcional: Recargar gráfico al filtrar
    $('#filtroFechasDiscapacidades').on('submit', function(e) {
        e.preventDefault();
        cargarGraficoDiscapacidadDonut();
    });
});

function cargarGraficoDiscapacidadDonut() {
    // Obtener fechas del formulario si existen
    const fechaInicio = $('#fechaInicioDiscapacidades').val();
    const fechaFin = $('#fechaFinDiscapacidades').val();
    
    $.ajax({
        url: 'ajax/AjaxChartDonusDiscapacidad.php',
        type: 'GET',
        dataType: 'json',
        data: {
            fecha_inicio: fechaInicio,
            fecha_fin: fechaFin
        },
        beforeSend: function() {
            $('#loadingDiscapacidades').show();
            $('#errorDiscapacidades').hide();
        },
        success: function(data) {
            console.log('Datos recibidos:', data); // Para depuración
            
            // Validar estructura de datos
            if (!data.labels || !data.datasets) {
                throw new Error('Estructura de datos incorrecta');
            }
            
            $('#loadingDiscapacidades').hide();
            
            const ctx = document.getElementById('donutChartDiscapacidades').getContext('2d');
            
            // Configuración extendida del gráfico
            window.donutChartDiscapacidades = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false, // Ocultamos la leyenda nativa
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
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
            
            actualizarLeyendaDiscapacidades(data);
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud:', xhr.responseText);
            $('#loadingDiscapacidades').hide();
            $('#errorDiscapacidades').show().find('.error-message').text(
                'Error al cargar los datos: ' + (xhr.responseJSON?.message || error)
            );
        }
    });
}

function actualizarLeyendaDiscapacidades(data) {
    if (!data.labels || !data.datasets || !data.datasets[0].backgroundColor) {
        console.error('Datos incompletos para la leyenda');
        return;
    }

    const legendHtml = `
        <div class="legend-container bg-light p-3 rounded">
            <h6 class="text-center mb-3"><i class="fas fa-list-ul mr-2"></i>Distribución</h6>
            <div class="row">
                ${data.labels.map((label, index) => `
                    <div class="col-6 col-md-4 mb-2">
                        <div class="d-flex align-items-center">
                            <span class="legend-color" style="background-color: ${data.datasets[0].backgroundColor[index]};"></span>
                            <small class="legend-text ml-2 text-truncate">${label}</small>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>`;
    
    $('#chartLegendDiscapacidades').html(legendHtml);
}