// Función para cargar el gráfico de etnias
function cargarGraficoEtniaDonut() {
    // Mostrar estado de carga
    $('#loadingEtnias').show();
    $('#errorEtnias').hide();
    
    // Obtener fechas del filtro si existen
    const fechaInicio = $('#fechaInicioEtnias').val();
    const fechaFin = $('#fechaFinEtnias').val();
    
    // Parámetros para la solicitud
    const params = new URLSearchParams();
    if(fechaInicio) params.append('fecha_inicio', fechaInicio);
    if(fechaFin) params.append('fecha_fin', fechaFin);
    
    fetch(`ajax/ajaxChartDonusEtnias.php?${params.toString()}`)
        .then(response => {
            if(!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Verificar estructura de datos
            if(!data.labels || !data.datasets) {
                throw new Error('Estructura de datos incorrecta');
            }
            
            const canvas = document.getElementById('donutChartEtnias');
            if(!canvas) {
                throw new Error('No se encontró el elemento canvas');
            }
            
            const ctx = canvas.getContext('2d');
            
            // Destruir gráfico anterior si existe
            
            // Crear nuevo gráfico con configuración extendida
            window.donutChartEtnias = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Ocultamos la leyenda nativa porque usamos la personalizada
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label.split(' (')[0] || '';
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
            
            // Actualizar leyenda
            actualizarLeyendaEtnias(data);
            $('#loadingEtnias').hide();
        })
        .catch(error => {
            console.error('Error al cargar datos:', error);
            $('#loadingEtnias').hide();
            $('#errorEtnias').show().find('.error-message').text(
                error.message || 'Error al cargar los datos étnicos'
            );
        });
}

// Función mejorada para actualizar leyenda
function actualizarLeyendaEtnias(data) {
    const legendContainer = $('#chartLegendEtnias');
    if(!legendContainer.length) return;
    
    try {
        let legendHtml = `
        <div class="legend-container bg-light p-3 rounded">
            <h6 class="text-center mb-3"><i class="fas fa-list-ul mr-2"></i>Distribución Étnica</h6>
            <div class="row">`;
        
        data.labels.forEach((label, index) => {
            const color = data.datasets[0].backgroundColor[index];
            const value = data.datasets[0].data[index];
            
            legendHtml += `
            <div class="col-6 mb-2">
                <div class="d-flex align-items-center">
                    <span class="legend-color" style="background-color: ${color};"></span>
                    <small class="legend-text ml-2">${label}</small>
                </div>
            </div>`;
        });
        
        legendHtml += `</div></div>`;
        legendContainer.html(legendHtml);
    } catch(error) {
        console.error('Error al generar leyenda:', error);
        legendContainer.html('<div class="alert alert-warning">Error al generar la leyenda</div>');
    }
}

// Eventos
$(document).ready(function() {
    // Cargar gráfico inicial
    cargarGraficoEtniaDonut();
    
    // Recargar al hacer clic en actualizar
    $('#btnActualizarEtnias').on('click', cargarGraficoEtniaDonut);
    
    // Recargar al aplicar filtros
    $('#filtroFechasEtnias').on('submit', function(e) {
        e.preventDefault();
        cargarGraficoEtniaDonut();
    });
});