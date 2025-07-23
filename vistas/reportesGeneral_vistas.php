<div class="row">
    <!-- Columna izquierda: Tabla de distribución por etnias -->
    <div class="col-lg-9 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <!-- Encabezado con título y botones -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1 text-primary">
                            <i class="fas fa-globe-americas mr-2"></i>Distribución por General
                        </h4>
                        <h6 class="card-subtitle text-muted">Distribución por General de pacientes atendidos</h6>
                    </div>
                    <!-- Botones de exportación -->
                    <div class="btn-group">
                        <button id="exportPDFGeneral" class="btn btn-sm btn-danger ml-2">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                </div>
                
                <!-- Filtro por fechas -->
                <div class="mb-3 p-3 border rounded bg-light">
                    <form id="filtroFechasConsolidado" class="row g-2">
                        <div class="col-md-5">
                            <label for="fechaInicioConsolidado" class="form-label small text-muted">Fecha Inicio</label>
                            <input type="date" class="form-control form-control-sm" id="fechaInicioConsolidado" name="fechaInicio">
                        </div>
                        <div class="col-md-5">
                            <label for="fechaFinConsolidado" class="form-label small text-muted">Fecha Fin</label>
                            <input type="date" class="form-control form-control-sm" id="fechaFinConsolidado" name="fechaFin">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                <i class="fas fa-filter mr-1"></i> Filtrar
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contenedor de la tabla -->
                <div class="table-responsive flex-grow-1" id="contenedorTablaConsolidado">
                    <?php 
                    require_once "controlador/listarControlador.php";
                    $controlador = new tablaControlador();
                    echo $controlador->mostrarReporteConsolidadoControlador();
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
</div>