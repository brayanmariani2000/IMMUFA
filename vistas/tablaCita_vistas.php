
<div class="col-lg-12 mb-40" id="tabla_t">

    <div class="card">

      <div class="card-body">

        <h4 class="card-title">Citas</h4>

          <h6 class="card-subtitle">Exportar datos Excel, PDF</h6>

            <div class="table-responsive m-t-40">

              <div id="example23_wrapper" class="dataTables_wrapper">

                <div id="example23_wrapper" class="dataTables_wrapper">

                  <div class="dt-buttons">
                    
                    <a class="dt-button buttons-copy buttons-html5" tabindex="1" id="exxel_cita">

                      <span>Excel</span>

                    </a>

                    <a class="dt-button  buttons-html5" tabindex="1" aria-controls="example23" id="pdf_cita">

                      <span>PDF</span>
                    
                    </a>

                    <div id="example23_filter" class="dataTables_filter">

                      <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23"></label>

                    </div>

                  <div>


                </div>

                <table  class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;" id="tablaCita">

                  <thead>

                    <tr role="row">

                      <th class=""  rowspan="1" colspan="1">N°</th>

                      <th class=""  rowspan="1" colspan="1"style="width: 200px;">Nombre y Apellido</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100.8px;">Cedula</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150.8px;">Area de Consulta</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150.8px;">Fecha Programada</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 10.8px;">Observacion</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 92.8px;">accion</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php /// aqui va la cabezera 
                                                        

                                                        require_once 'controlador/citaControlador.php';

                                                        $tabla=new citaControlador();

                                                        echo $tabla->mostrar_citas();

                    ?>

                  </tbody>

                </table>

              </div>

                 <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">

                  <div class="dataTables_paginate paging_simple_numbers" id="example23_paginate">

                        
                  <a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous">Previous</a>

                  <span>
                    <a class="paginate_button current" aria-controls="example23" data-dt-idx="1" tabindex="0">1</a>
                        
                    <a class="paginate_button " aria-controls="example23" data-dt-idx="2" tabindex="0">2</a>
                    
                    <a class="paginate_button " aria-controls="example23" data-dt-idx="3" tabindex="0">3</a>
                    
                    <a class="paginate_button " aria-controls="example23" data-dt-idx="4" tabindex="0">4</a>
                    
                    <a class="paginate_button " aria-controls="example23" data-dt-idx="5" tabindex="0">5</a>
                    
                    <a class="paginate_button " aria-controls="example23" data-dt-idx="6" tabindex="0">6</a>

                  </span>
                    
                    <a class="paginate_button next" aria-controls="example23" data-dt-idx="7" tabindex="0" id="example23_next">Next</a>

                  </div>

              </div>

            </div>

          </div>

        </div>

      </div>
                        
    </div>
                
</div>
                <!-- ============
                VER INFORMACION DEL PACIENTE MODAL 
                ==============-->
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
          
      <button type="submit" class="btn btn-dark" data-dismiss="modal" id="botonAc">Actualizar</button>
          

      </div>

    </div>

</div>

</div>


        <!-- ============
                ACTUALIZAR INFORMACION DEL PACIENTE MODAL 
                ==============-->
