

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Citas por especialidad</h4>
                <h6 class="card-subtitle">Exportar PDF &amp;</h6>
                <div class="table-responsive m-t-40">
                    <div id="example23_wrapper" class="dataTables_wrapper">
                        <?php
                        // Obtener el ID de especialidad de manera consistente
                        $id_especialidad = $_REQUEST['id_especialidad'] ?? $_POST['id_especialidad'] ?? null;
                        
                        if(!$id_especialidad) {
                            die("No se ha especificado una especialidad");
                        }
                        
                        require_once './controlador/citaControlador.php';
                        $cita = new citaControlador();
                        $paginacion = $cita->cita_Especialidad($id_especialidad, $_GET['pagina'] ?? 1);
                        ?>
                        
                        <div class="dt-buttons">
                            <a id="expotarPDFCitaEspecialidad" href="#" class="btn btn-info position-relative text-decoration-none">
                                <i class="fas fa-file-pdf me-2"></i>
                                Generar PDF
                            </a>
                        </div>
                        <table id="especialidad" class="table table-hover table-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 8px;">N°</th>
                                    <th style="width:25%;">Nombre y Apellido</th>
                                    <th style="width:10%">Cedula</th>
                                    <th style="width:20%">Motivo de la cita</th>
                                    <th style="width:20%">Fecha de atencion</th>
                                    <th style="width:5%">Edad</th>
                                    <th style="width:20%">Estado de la cita</th>
                                    <th style="width:10%">accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $paginacion['html']; ?>
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
                            Mostrando <?php echo (($paginacion['paginaActual'] - 1) * 10) + 1; ?> a 
                            <?php echo min($paginacion['paginaActual'] * 10, $paginacion['totalRegistros']); ?> de 
                            <?php echo $paginacion['totalRegistros']; ?> registros
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="example23_paginate">
                            <?php if ($paginacion['paginaActual'] > 1): ?>
                                <a class="paginate_button previous" aria-controls="example23" 
                                   href="?id_especialidad=<?php echo $id_especialidad; ?>&pagina=<?php echo $paginacion['paginaActual'] - 1; ?>" 
                                   data-dt-idx="0" tabindex="0" id="example23_previous">Anterior</a>
                            <?php else: ?>
                                <a class="paginate_button previous disabled" aria-controls="example23" 
                                   data-dt-idx="0" tabindex="0" id="example23_previous">Anterior</a>
                            <?php endif; ?>
                            
                            <span>
                                <?php for ($i = 1; $i <= $paginacion['totalPaginas']; $i++): ?>
                                    <a class="paginate_button <?php echo ($i == $paginacion['paginaActual']) ? 'current' : ''; ?>" 
                                       aria-controls="example23" 
                                       href="?id_especialidad=<?php echo $id_especialidad; ?>&pagina=<?php echo $i; ?>" 
                                       data-dt-idx="<?php echo $i; ?>" tabindex="0"><?php echo $i; ?></a>
                                <?php endfor; ?>
                            </span>
                            
                            <?php if ($paginacion['paginaActual'] < $paginacion['totalPaginas']): ?>
                                <a class="paginate_button next" aria-controls="example23" 
                                   href="?id_especialidad=<?php echo $id_especialidad; ?>&pagina=<?php echo $paginacion['paginaActual'] + 1; ?>" 
                                   data-dt-idx="<?php echo $paginacion['paginaActual'] + 1; ?>" 
                                   tabindex="0" id="example23_next">Siguiente</a>
                            <?php else: ?>
                                <a class="paginate_button next disabled" aria-controls="example23" 
                                   data-dt-idx="<?php echo $paginacion['paginaActual'] + 1; ?>" 
                                   tabindex="0" id="example23_next">Siguiente</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="veirInfo_cita" role="dialog">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header"style="background:#3c8dbc; color:white" >

        <h5 class="modal-title">Datos del Paciente</h5>

        <button type="button" class="close" data-dismiss="modal" id="cerrarIconInfo"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">

      <div class="box-body">

        <div class="form-group row">

            <div class="col-md-4">

            <label for="nombrePaciente">Nombre</label>

            <p id="nombrePaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="apellidoPaciente">apellido</label>

            <p  id="apellidoPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="cedulaPaciente">cedula</label>

            <p  id="cedulaPaciente"></p>

            </div>

        </div>

        <center><h5 class="modal-title" id="exampleModalLabel">Citas</h5></center>

        <div class="form-group row" id="citasInfo">

            <div class="col-md-4">

            <label for="fechaAntencionPaciente">fecha de antencion</label>

            <p id="fechaAntencionPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="estadoPaciente">estado</label><br><br>

            <select name="condicion" id="condicionCita" class="form-control">
            
              <option value="1">Agendada</option>

              <option value="2">Pospuesta</option>
              
              <option value="3">Atendida</option>
              
              <option value="4">Perdida</option>
            
            </select>

            </div>

            <div class="col-md-4">

            <label for="especialidad_cita_persona">area de Consulta</label>

            <p  id="especialidadCitaPersona"></p>

            </div>
            
            <div class="">
               <input type="hidden" name="id_cita" id="id_cita">
               <input type="hidden" name="id_consulta" id="id_consulta">
            </div>

        </div>

      </div>

     </div>

      <div class="modal-footer">

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="cerrarBtnActul">Cerrar</button>
          
      <button type="submit" class="btn btn-dark" data-dismiss="modal" id="ActualizarBtnActul">Actualizar</button>
          

      </div>

    </div>

</div>

</div>
