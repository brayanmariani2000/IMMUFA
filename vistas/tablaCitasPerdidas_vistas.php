<div class="col-lg-12 mb-40" id="tabla_t">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Citas Perdidas</h4>
            <h6 class="card-subtitle">Exportar datos Excel, PDF</h6>
            
            <div class="table-responsive m-t-40">
                <div id="example23_wrapper" class="dataTables_wrapper">
                    <div class="dt-buttons">
                        <a id="pdf_cita" href="#" class="btn btn-info position-relative text-decoration-none">
                            <i class="fas fa-file-pdf me-2"></i>
                            Generar PDF
                        </a>
                        
                    </div>
                    
                    <table class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;" id="tablaCita">
                        <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">N°</th>
                                <th rowspan="1" colspan="1" style="width: 20%;" id='nombrePacientetabla'>Nombre y Apellido</th>
                                <th style="width: 20%;" id='cedulaPacientetabla'>Cédula</th>
                                <th tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 15%">Fecha Programada</th>
                                <th tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 15%">Dependencias</th>
                                <th tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 20%">Área de Consulta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require_once 'controlador/citaControlador.php';
                            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                            $tabla = new citaControlador();
                            $resultados = $tabla->mostrar_citas_perdidas($paginaActual);
                            echo $resultados['html'];
                            ?>
                        </tbody>
                    </table>
                    
                    <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
                        Mostrando <?php echo ($paginaActual - 1) * $resultados['paginacion']['registrosPorPagina'] + 1 ?> 
                        a <?php echo min($paginaActual * $resultados['paginacion']['registrosPorPagina'], $resultados['paginacion']['totalCitas']) ?> 
                        de <?php echo $resultados['paginacion']['totalCitas'] ?> registros
                    </div>
                    
                    <div class="dataTables_paginate paging_simple_numbers" id="example23_paginate">
                        <?php
                        $urlBase = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?page=tablaCitasPerdidas";
                        
                        // Botón Anterior
                        if ($paginaActual > 1) {
                            echo '<a class="paginate_button previous" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous" href="'.$urlBase.'&pagina='.($paginaActual - 1).'">Previous</a>';
                        } else {
                            echo '<a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous">Previous</a>';
                        }
                        
                        // Números de página
                        echo '<span>';
                        $inicioPaginas = max(1, $paginaActual - 2);
                        $finPaginas = min($resultados['paginacion']['totalPaginas'], $paginaActual + 2);
                        
                        for ($i = $inicioPaginas; $i <= $finPaginas; $i++) {
                            $clase = ($i == $paginaActual) ? 'paginate_button current' : 'paginate_button';
                            echo '<a class="'.$clase.'" aria-controls="example23" data-dt-idx="'.$i.'" tabindex="0" href="'.$urlBase.'&pagina='.$i.'">'.$i.'</a>';
                        }
                        echo '</span>';
                        
                        // Botón Siguiente
                        if ($paginaActual < $resultados['paginacion']['totalPaginas']) {
                            echo '<a class="paginate_button next" aria-controls="example23" data-dt-idx="'.($paginaActual + 1).'" tabindex="0" id="example23_next" href="'.$urlBase.'&pagina='.($paginaActual + 1).'">Next</a>';
                        } else {
                            echo '<a class="paginate_button next disabled" aria-controls="example23" data-dt-idx="'.($paginaActual + 1).'" tabindex="0" id="example23_next">Next</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>