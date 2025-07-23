
<div class="col-lg-12 mb-40" id="tabla_t">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Citas</h4>
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
                                <th class="text-center p-3" rowspan="1" colspan="1" style="width: 5%; min-width: 50px;">N°</th>
                                <th class="text-start p-3" rowspan="1" colspan="1" style="width: 25%; min-width: 200px;" id='nombrePacientetabla'>Nombre y Apellido</th>
                                <th class="text-center p-3" style="width: 10%; min-width: 100.8px;" id='cedulaPacientetabla'>Cédula</th>
                                <th class="text-start p-3" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 15%; min-width: 150.8px;">Área de Consulta</th>
                                <th class="text-center p-3" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 15%; min-width: 150.8px;">Fecha Programada</th>
                                <th class="text-start p-3" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 20%; min-width: 150px;">Observación</th>
                                <th class="text-center p-3" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" style="width: 10%; min-width: 92.8px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require_once 'controlador/citaControlador.php';
                            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                            $tabla = new citaControlador();
                            $resultados = $tabla->mostrar_citas($paginaActual);
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
                        $urlBase = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?page=tablaCita";
                        
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
                <!-- ============
                VER INFORMACION DEL PACIENTE MODAL 
                ==============-->
                <div class="modal fade" id="veirInfo_cita" tabindex="-1" aria-labelledby="veirInfo_citaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow">
      <!-- Encabezado del Modal -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fs-5" id="veirInfo_citaLabel">
          <i class="fas fa-user-injured me-2"></i>Datos del Paciente
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
      </div>
      
      <!-- Cuerpo del Modal -->
      <div class="modal-body p-4">
        <div class="container-fluid">
          <!-- Sección de Información Básica -->
          <div class="row mb-4">
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold text-primary">
                <i class="fas fa-signature me-2"></i>Nombre
              </label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                <p class="form-control bg-light mb-0" id="nombrePaciente"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold text-primary">
                <i class="fas fa-signature me-2"></i>Apellido
              </label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                <p class="form-control bg-light mb-0" id="apellidoPaciente"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold text-primary">
                <i class="fas fa-id-card me-2"></i>Cédula
              </label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-address-card text-primary"></i></span>
                <p class="form-control bg-light mb-0" id="cedulaPaciente"></p>
              </div>
            </div>
          </div>
          
          <!-- Sección de Citas -->
          <div class="text-center mb-4">
            <h5 class="fw-bold text-primary">
              <i class="fas fa-calendar-check me-2"></i>Información de Cita
            </h5>
          </div>
          
          <div class="row" id="citasInfo">
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold text-primary">
                <i class="far fa-calendar-alt me-2"></i>Fecha de Atención
              </label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-clock text-primary"></i></span>
                <p class="form-control bg-light mb-0" id="fechaAntencionPaciente"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold text-primary">
                <i class="fas fa-clipboard-check me-2"></i>Estado
              </label>
              <select class="form-control" id="condicionCita">
                <option value="1">🟡 Agendada</option>
                <option value="2">🔵 Pospuesta</option>
                <option value="3">🟢 Atendida</option>
                <option value="4">🔴 Perdida</option>
              </select>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold text-primary">
                <i class="fas fa-stethoscope me-2"></i>Área de Consulta
              </label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-clinic-medical text-primary"></i></span>
                <p class="form-control bg-light mb-0" id="especialidadCitaPersona"></p>
              </div>
            </div>
            
            <!-- Campos ocultos -->
            <input type="hidden" name="id_cita" id="id_cita">
            <input type="hidden" name="id_consulta" id="id_consulta">
          </div>
        </div>
      </div>
      
      <!-- Pie del Modal -->
      <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
        <button type="button" class="btn btn-primary" id="ActualizarBtnActul">
          <i class="fas fa-save me-2"></i>Actualizar
        </button>
      </div>
    </div>
  </div>
</div>

