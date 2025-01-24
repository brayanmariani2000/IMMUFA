
<div class="col-12 mb-40" id="tabla_t">

    <div class="card">

      <div class="card-body">

        <h4 class="card-title">Citas</h4>

          <h6 class="card-subtitle">Exportar datos Excel, PDF</h6>

            <div class="table-responsive m-t-40">

              <div id="example23_wrapper" class="dataTables_wrapper">

                <div id="example23_wrapper" class="dataTables_wrapper">

                  <div class="dt-buttons">
                    
                    <a class="dt-button buttons-copy buttons-html5" tabindex="1" href="#">

                      <span>Excel</span>

                    </a>

                    <a class="dt-button buttons-pdf buttons-html5" tabindex="1" aria-controls="example23" href="#">

                      <span>PDF</span>
                    
                    </a>

                    <div id="example23_filter" class="dataTables_filter">

                      <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23"></label>

                    </div>

                  <div>


                </div>

                <table  class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">

                  <thead>

                    <tr role="row">

                      <th class=""  rowspan="1" colspan="1">N°</th>

                      <th class=""  rowspan="1" colspan="1"style="width: 131.8px;">Nombre y Apellido</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Cedula</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Direccion</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Discapacidad</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Etnia</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Edad</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Accion</th>

                    </tr>

                  </thead>

                  <tbody>
                 
                    <?php /// aqui va la cabezera 
                                     
                    
                       require_once 'controlador/loginControlador.php';
                    
                       $tabla=new loginControlador();
                    
                       echo $tabla->listar_cita();
                    
                                     
                    ?>

                  </tbody>

                </table>

              </div>

              <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries

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
<div class="modal fade" id="veirInfoPaciente" role="dialog">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header"style="background:#3c8dbc;padding-button:0px " >

        <h5 class="modal-title" style="color:white; padding-top:0px">Datos del Paciente</h5>

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

        <div class="form-group row">

            <div class="col-md-4">

            <label for="fechaNaciPaciente">fecha de Nacimiento</label>

            <p id="fechaNaciPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="edadPaciente">edad</label>

            <p  id="edadPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="sexoPaciente">sexo</label>

            <p  id="sexoPaciente"></p>

            </div>

        </div>

        <div class="form-group row">

            <div class="col-md-4">

            <label for="discapacidadPaciente">discapacidad</label>

            <p id="discapacidadPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="etniaPaciente">etnia</label>

            <p  id="etniaPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="telefonoPaciente">telefono</label>

            <p  id="telefonoPaciente"></p>

            </div>

        </div>

        <center><h5 class="modal-title" id="exampleModalLabel">Direccion</h5></center>

        <div class="form-group row">

            <div class="col-md-4">

            <label for="municipioPaciente">Municipio</label>

            <p id="municipioPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="parroquiaPaciente">Parroquia</label>

            <p  id="parroquiaPaciente"></p>

            </div>

            <div class="col-md-4">

            <label for="sectorPaciente">Sector</label>

            <p  id="sectorPaciente"></p>

            </div>

        </div>


      </div>

     </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cerrarBtnInfo">Cerrar</button>

      </div>

    </div>

</div>

</div>


        <!-- ============
                ACTUALIZAR INFORMACION DEL PACIENTE MODAL 
                ==============-->

<div class="modal fade" id="actualizarPaciente" tabindex="-1" role="dialog" aria-labelledby="ActualizarPacienteModal" aria-hidden="true">

  <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="ActualizarPacienteModal">Datos del Paciente</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarIconActul"><span aria-hidden="true">&times;</span></button>

        </div>

        <div class="modal-body">

          <form id="actualizarPacienteFormulario" method="POST">

          <div class="form-group row">

              <div class="col-md-4">

              <label for="nombrePacienteActualizar">Nombre</label>

              <input type="text" id="nombrePacienteActualizar" name="nombreActul" class="col-md-11">

              </div>

              <div class="col-md-4">

              <label for="apellidoPacienteActualizar">apellido</label>

              <input type="text" id="apellidoPacienteActualizar" name="apellidoActul" class="col-md-11">

              </div>

              <div class="col-md-4">

              <label for="cedulaPacienteActualizar">cedula</label>

              <input type="text" id="cedulaPacienteActualizar"name="cedulaActul" class="col-md-11">

              </div>

          </div>

          <div class="form-group row">

              <div class="col-md-4">

              <label for="fechaNaciPacienteActualizar">fecha de Nacimiento</label>

              <input type="text" id="fechaNaciPacienteActualizar"class="col-md-11" name="fechaNaciActul">

              </div>

              <div class="col-md-4">

              <label for="edadPacienteActualizar">edad</label>

              <input type="text"  id="edadPacienteActualizar" class="col-md-11" name="edadActul">

              </div>

              <div class="col-md-4">

              <label for="sexoPacienteActualizar">sexo</label>

              <select name="sexoActul" id="sexoPacienteActualizar" class="p-1">

                <option value="1">FEMENINO</option>

                <option value="2">MASCULINO</option>

              </select>

              </div>

          </div>

          <div class="form-group row">

              <div class="col-md-4">

              <label for="discapacidadPacienteActualizar">discapacidad</label>

              <select name="discapacidadActul" id="discapacidadPacienteActualizar" class="p-1 col-md-11" >

               <option value="1">MOTORA</option>

               <option value="2">AUDITIVA</option>

               <option value="3">VISUAL</option>

               <option value="4">MENTAL</option>


              </select>

              </div>

              <div class="col-md-4">

              <label for="etniaPacienteActualizar">etnia</label>

              <select name="etniaActul" id="etniaPacienteActualizar" class="p-1">

            <?php  require_once './controlador/listarControlador.php'; $area=new listarControlador(); $area->listar_etnias_controlador(); ?>

            </select>
            
              </div>
              
              <div class="col-md-4">
                
              <label for="telefonoPacienteActualizar">telefono</label>
              
              <input type="text"  id="telefonoPacienteActualizar" class="col-md-12" name="telefonoActul">
              
              </div>
              
          </div>
          
          <center><h5 class="modal-title" id="exampleModalLabel">Direccion</h5></center>
          
          <div class="form-group row">
            
              <div class="col-md-6">
                
              <label for="municipioPacienteActualizar">Municipio</label>
              
              <select name="municipioActul" id="municipioPacienteActualizar" class=" p-1">
                
              <?php $area->listar_municipio_controlador();?>
              
              </select>
              
              </div>
              
              <div class="col-md-5">
                
              <label for="parroquiaPacienteActualizar">Parroquia</label>
              
              <select id="parroquiaPacienteActualizar" class="col-md-12 p-1" name="parroquiaActul"></select>
              
              </div>
              
          </div>
          
        </div>
        
        <div class="modal-footer">
          
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="cerrarBtnActul">Cerrar</button>
          
          <button type="submit" class="btn btn-dark" data-dismiss="modal" id="botonAc">Actualizar</button>
          
         
          </div>
          
          </form>
          
      </div>
      
    </div>
    
</div>

<!-- Button trigger modal -->   
