<div class="col-12 mb-4" id="tabla_t">
    <div class="card shadow-sm">
        <div class="card-header  text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title mb-0">Historial de Citas</h4>
                    <h6 class="card-subtitle mb-0 text-white-50">Exportar datos a Excel, PDF</h6>
                </div>
                <div class="btn-group">
                <span class="input-group-text bg-light">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Buscar paciente..." id="buscarPacienteHistorial">
                </div>
            </div>
        </div>
        

        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="historialCitaTotal">
            <thead>
                <!-- Encabezados de columnas -->
            </thead>
            <tbody>
                <?php 
                require_once "./controlador/citaControlador.php";
                $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                $tablaH = new citaControlador();
                $resultados = $tablaH->Historia_cita_controlador($paginaActual);
                
                echo $resultados['datos'];
                ?>
            </tbody>
        </table>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="dataTables_info">
                <?php
                $inicio = (($paginaActual - 1) * 10) + 1;
                $fin = min($paginaActual * 10, $resultados['paginacion']['totalRegistros']);
                echo "Mostrando $inicio a $fin de ".$resultados['paginacion']['totalRegistros']." registros";
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end mb-0">
                    <?php
                    // URL base para paginación
                    $urlBase = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?page=HistoriaCita";
                    
                    // Botón Anterior
                    if ($paginaActual > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $urlBase ?>&pagina=<?= $paginaActual - 1 ?>">Anterior</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                    <?php endif;
                    
                    // Números de página
                    $inicioPaginas = max(1, $paginaActual - 2);
                    $finPaginas = min($resultados['paginacion']['totalPaginas'], $paginaActual + 2);
                    
                    for ($i = $inicioPaginas; $i <= $finPaginas; $i++): ?>
                        <li class="page-item <?= ($i == $paginaActual) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $urlBase ?>&pagina=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor;
                    
                    // Botón Siguiente
                    if ($paginaActual < $resultados['paginacion']['totalPaginas']): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $urlBase ?>&pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Siguiente</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
        </div>
    </div>
</div>