<div class="row">
    <!-- Columna izquierda: Tabla de rangos de edad -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <!-- Encabezado con título y botones -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1 text-primary">
                            <i class="fas fa-users mr-2"></i>Distribución por Edades
                        </h4>
                        <h6 class="card-subtitle text-muted">Rangos de edad de pacientes atendidos</h6>
                    </div>
                    <!-- Botones de exportación -->
                    <div class="btn-group">
                        <button id="exportExcelEdades" class="btn btn-sm btn-success">
                            <i class="fas fa-file-excel mr-1"></i> Excel
                        </button>
                        <button id="exportPDFEdades" class="btn btn-sm btn-danger ml-2">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                </div>
                
                <!-- Contenedor de la tabla -->
                <div class="table-responsive flex-grow-1">
                    <?php 
                    require_once "controlador/listarControlador.php";
                    $controlador = new tablaControlador();
                    echo $controlador->listar_edades_paciente_tabla_controlador();
                    ?>
                </div>
                
                <!-- Pie de tarjeta -->
                <div class="mt-auto pt-2 text-right small text-muted">
                    <i class="fas fa-sync-alt mr-1"></i>Actualizado: <?php echo date('d/m/Y H:i'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Columna derecha: Gráfico donut -->
    <div class="col-lg-7">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <!-- Título del gráfico -->
                <div class="text-center mb-3">
                    <h3 class="text-primary">
                        <i class="fas fa-chart-pie mr-2"></i>Distribución por Grupos de Edad
                    </h3>
                    <p class="text-muted mb-0">Porcentaje de pacientes por rango etario</p>
                </div>
                
                <!-- Contenedor del gráfico -->
                <div class="chart-containe">
                    <canvas id="donutChartEdades"></canvas>
                    <div id="loadingEdades">
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Cargando...</span>
                            </div>
                          
                        </div>
                    </div>
                    <div id="errorEdades" class="alert alert-danger text-center" style="display: none;"></div>
                </div>
                
                <!-- Leyenda interactiva -->
                <div class="mt-3 d-flex justify-content-center flex-wrap" id="chartLegendEdades"></div>
            </div>
        </div>
    </div>
</div>