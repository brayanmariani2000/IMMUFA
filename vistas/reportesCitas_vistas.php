<div class="row">
    <!-- Columna izquierda: Tabla de pacientes por especialidad -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <!-- Encabezado de la tarjeta con botones -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1 text-primary">
                            <i class="fas fa-stethoscope mr-2"></i>Citas por Especialidad
                        </h4>
                        <h6 class="card-subtitle text-muted">Distribución de pacientes atendidos</h6>
                    </div>
                    <!-- Botones de exportación -->
                    <div class="btn-group">
                        <button id="excel_citas" class="btn btn-sm btn-success">
                            <i class="fas fa-file-excel mr-1"></i> Excel
                        </button>
                        <button id="exportarPdfEspecialidad" class="btn btn-sm btn-danger ml-2">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                </div>
                
                <!-- Filtro por fechas -->
                <div class="mb-3 p-3">
                    <form id="filtroFechasEspecialidad" method="post" class="row g-2">
                        <div class="col-md-5">
                            <label for="fechaInicioEspecialidad" class="form-label small text-muted">Fecha Inicio</label>
                            <input type="date" class="form-control form-control-sm" id="fechaInicioEspecialidad" name="fechaInicio">
                        </div>
                        <div class="col-md-5">
                            <label for="fechaFinEspecialidad" class="form-label small text-muted">Fecha Fin</label>
                            <input type="date" class="form-control form-control-sm" id="fechaFinEspecialidad" name="fechaFin">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm ">
                                <i class="fas fa-filter mr-1"></i> Filtrar
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Fin Filtro por fechas -->
                
                <!-- Contenedor de la tabla -->
                <div class="table-responsive flex-grow-1" id="contenedorTablaEspecialidad">
                    <?php 
                    require_once "controlador/listarControlador.php";
                    $controlador = new tablaControlador();
                    echo $controlador->listar_citas_cantidad_especialidad_tabla_controlador();
                    ?>
                </div>
                
                <!-- Pie de tarjeta -->
                <div class="mt-auto pt-2 text-right small text-muted">
                    Actualizado: <?php echo date('d/m/Y H:i'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Columna derecha: Gráfico donut -->
    <div class="col-lg-7">
        <div class="card">
            <div class="col-md-12">
                <h2 class="text-center mb-4">
                <i class="fas fa-chart-pie mr-2"></i>Distribución por Especialidad</h2>
                <div class="card">
                    <div class="card-body">
                        <!-- Contenedor del gráfico con estados de carga/error -->
                        <div class="chart-container" style="position: relative; height: 400px; width: 100%;">
                            <canvas id="donutChartCitas"></canvas>
                            <div id="chartLoading" class="loading">Cargando datos...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>