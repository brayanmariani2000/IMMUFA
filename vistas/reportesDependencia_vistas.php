<div class="row">
    <!-- Columna izquierda: Tabla de pacientes por dependencia -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <!-- Encabezado con título y botones -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1 text-primary">
                            <i class="fas fa-building mr-2"></i>Pacientes por Dependencia
                        </h4>
                        <h6 class="card-subtitle text-muted">Distribución según procedencia institucional</h6>
                    </div>
                    <!-- Botones de exportación -->
                    <div class="btn-group">
                        
                        <button id="exportPDFDependencias" class="btn btn-sm btn-danger ml-2">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                    
                </div>
                <div class="mb-3 p-3">
                    <form id="filtroFechasDependencias" method="post" class="row g-2">
                        <div class="col-md-5">
                            <label for="fechaInicio" class="form-label small text-muted">Fecha Inicio</label>
                            <input type="date" class="form-control form-control-sm" id="fechaInicio" name="fechaInicio">
                        </div>
                        <div class="col-md-5">
                            <label for="fechaFin" class="form-label small text-muted">Fecha Fin</label>
                            <input type="date" class="form-control form-control-sm" id="fechaFin" name="fechaFin">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm ">
                                <i class="fas fa-filter mr-1"></i> Filtrar
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contenedor de la tabla -->
                <div class="table-responsive flex-grow-1" id="contenedorTablaDependencias">
                    <?php 
                    require_once "controlador/listarControlador.php";
                    $controlador = new tablaControlador();
                    echo $controlador->listar_citas_cantidad_dependecias_tabla_controlador();
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
                        <i class="fas fa-chart-pie mr-2"></i>Distribución por Dependencia
                    </h3>
                    <p class="text-muted mb-0">Porcentaje de pacientes según institución de procedencia</p>
                </div>
                
                <!-- Contenedor del gráfico -->
                <div class="chart-container ">
                    <canvas id="donutChartDependencias"></canvas>
                    <div id="chartLoadingDeps">
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Cargando...</span>
                            </div>
                        </div>
                    </div>
                    <div id="chartErrorDeps" class="alert alert-danger text-center" style="display: none;"></div>
                </div>
                
                <!-- Leyenda interactiva -->
                <div class="mt-3 d-flex justify-content-center flex-wrap" id="chartLegendDeps"></div>
            </div>
        </div>
    </div>
</div>
