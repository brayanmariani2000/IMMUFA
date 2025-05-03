<div class="row">
    <!-- Columna izquierda: Tabla de pacientes por municipio -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Encabezado de la tarjeta -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1">Pacientes por Municipio</h4>
                        <h6 class="card-subtitle text-muted">Exportar datos a Excel o PDF</h6>
                    </div>
                    <!-- Botones de exportación -->
                    <div class="dt-buttons btn-group">
                        <button id="excel_municipios" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel mr-1"></i> Excel
                        </button>
                        <button id="pdf_municipios" class="btn btn-danger btn-sm ml-2">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                </div>
                
                <!-- Tabla responsive -->
                <div class="table-responsive">
                    <?php 
                    require_once "controlador/listarControlador.php";
                    $controlador = new tablaControlador();
                    echo $controlador->listarPacientesPorMunicipioTablaControlador();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Columna derecha: Gráfico donut -->
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">Distribución por Municipio</h2>
                <div class="chart-container" style="position: relative; height: 400px;">
                    <canvas id="donutChartMunicipios"></canvas>
                    <div id="chartLoading" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Cargando datos...</span>
                        </div>
                        <p class="mt-2">Cargando gráfico...</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">Haz clic en los segmentos para más detalles</small>
                </div>
            </div>
        </div>
    </div>
</div>