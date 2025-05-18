<div class="row">
    <!-- Columna izquierda: Tabla de distribución por etnias -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <!-- Encabezado con título y botones -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1 text-primary">
                            <i class="fas fa-globe-americas mr-2"></i>Distribución por Etnias
                        </h4>
                        <h6 class="card-subtitle text-muted">Composición étnica de pacientes atendidos</h6>
                    </div>
                    <!-- Botones de exportación -->
                    <div class="btn-group">
                        <button id="exportExcelEtnias" class="btn btn-sm btn-success">
                            <i class="fas fa-file-excel mr-1"></i> Excel
                        </button>
                        <button id="exportPDFEtnias" class="btn btn-sm btn-danger ml-2">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                </div>
                
                <!-- Filtro por fechas -->
                <div class="mb-3 p-3 border rounded bg-light">
                    <form id="filtroFechasEtnia" method="post" class="row g-2">
                        <div class="col-md-5">
                            <label for="fechaInicioEtnia" class="form-label small text-muted">Fecha Inicio</label>
                            <input type="date" class="form-control form-control-sm" id="fechaInicioEtnia" name="fechaInicio">
                        </div>
                        <div class="col-md-5">
                            <label for="fechaFinEtnia" class="form-label small text-muted">Fecha Fin</label>
                            <input type="date" class="form-control form-control-sm" id="fechaFinEtnia" name="fechaFin">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                <i class="fas fa-filter mr-1"></i> Filtrar
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contenedor de la tabla -->
                <div class="table-responsive flex-grow-1" id="contenedorTablaEtnia">
                    <?php 
                    require_once "controlador/listarControlador.php";
                    $controlador = new tablaControlador();
                    echo $controlador->listarPacientesPorEtniaTablaControlador();
                    ?>
                </div>
                
                <!-- Pie de tarjeta -->
                <div class="mt-auto pt-2 text-right small text-muted">
                    <i class="fas fa-sync-alt mr-1"></i>Actualizado: <?php echo date('d/m/Y H:i'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Columna derecha: Gráfico donut de etnias -->
<!-- Columna derecha: Gráfico donut de etnias -->
<div class="col-lg-7">
    <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">
            <!-- Contenedor del gráfico -->
            <div class="chart-container" style="position: relative; height: 350px; width: 100%;">
                <canvas id="donutChartEtnias"></canvas>
                <div id="loadingEtnias" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                    <p class="mt-2">Cargando datos étnicos...</p>
                </div>
                <div id="errorEtnias" class="alert alert-danger text-center py-3" style="display: none;">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span class="error-message"></span>
                </div>
            </div>
            
            <!-- Leyenda -->
            <div id="chartLegendEtnias" class="mt-3"></div>
            
            <!-- Botón de actualización -->
            <div class="mt-auto pt-2 text-center">
                <button id="btnActualizarEtnias" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-sync-alt mr-1"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>
</div>