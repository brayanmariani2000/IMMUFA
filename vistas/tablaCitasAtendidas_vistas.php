<div class="col-lg-12 mb-40" id="tabla_t">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Citas Atendidas</h4>
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
                            <tr>
                                <th class="text-center" style="width: 5%; min-width: 50px;">N°</th>
                                <th class="text-start" style="width: 25%; min-width: 250px;" id='nombrePacientetabla'>
                                    <i class="fas fa-user me-2"></i>Nombre y Apellido
                                </th>
                                <th class="text-center" style="width: 15%; min-width: 150px;" id='cedulaPacientetabla'>
                                    <i class="fas fa-id-card me-2"></i>Cédula
                                </th>
                                <th class="text-start" style="width: 20%; min-width: 200px;">
                                    <i class="fas fa-stethoscope me-2"></i>Área de Consulta
                                </th>
                                <th class="text-center" style="width: 20%; min-width: 180px;">
                                    <i class="far fa-calendar-alt me-2"></i>Fecha Programada
                                </th>
                                <th class="text-start" style="width: 20%; min-width: 200px;">
                                    <i class="fas fa-building me-2"></i>Dependencias
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require_once 'controlador/citaControlador.php';
                            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                            $tabla = new citaControlador();
                            $resultados = $tabla->mostrar_citas_atendidas($paginaActual);
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
                        $urlBase = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?page=tablaCitasAtendidas";
                        
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