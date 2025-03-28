 <?php require_once './controlador/listarControlador.php'; $area=new listarControlador();?>
<div class="row">
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

                      <a class="dt-button buttons-pdf buttons-html5" tabindex="1" aria-controls="example23"  id='generarReportesCompletos'>

                      <span>Genrar Reportes</span>

                      </a>

                      <div id="example23_filter" class="dataTables_filter">

                        <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23"></label>

                      </div>

                    <div>


                  </div>

                  <table class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">

                    <thead>

                      <tr role="row">

                        <th class="" rowspan="1" colspan="1">N°</th>

                        <th class="" rowspan="1" colspan="1" style="">Nombre y Apellido</th>

                        <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Cedula</th>

                        <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Especialidad</th>

                        <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Especialista</th>

                        <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Fecha De Atencion</th>

                        <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Fecha de Registro</th>

                        <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Secretaria</th>

                      </tr>

                    </thead>

                    <tbody>

            
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
</div>
</div>
<div class="modal fade" id="ReportesGenerarModal" role="dialog">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <h5 class="modal-title">Generar Reportes</h5>

        <button type="button" class="close" data-dismiss="modal" id="cerrarIconInfo"><span aria-hidden="true">×</span></button>

      </div>
      <div class="modal-body">

      <div class="box-body">

        <div class="form-group row">

            <div class="col-md-4">

            <label for="nombrePaciente">fecha de inicio</label>

            <input type="date" class="form-control">

            </div>

            <div class="col-md-4">

            <label for="apellidoPaciente">fecha final</label>

            <input type="date" class="form-control">

            </div>

            <div class="col-md-4">

            <label for="especialista">Especialista</label>
                                        
                                        <select name="especialista" id="especialista" class="form-control">
                                            
                                             <option value="0">---SELECIONE UNA OPCION---</option>
                                                                 
                                        </select>

            </div>

            <div class="col-md-4">

            <label for="fechaAntencionPaciente">Especialidad</label>

            <select name="area_consultar" id="area_consultar" class="form-control">
                                        
                                        <option value="0">---SELECIONE UNA OPCION---</option>
                                    
                                        <?php $area->listar_especialidad_controlador();?>
                                        
                                    </select>

            </div>

            <div class="col-md-4">

            <label for="estadoPaciente">Dependencia</label>

            <select name="dependencia" id="dependencia" class="form-control">
                                        
                                        <option value="0">---SELECIONE UNA OPCION---</option>
                                        
                                        <?php  $area->listar_dependencias_controlador();?>

                                    </select>

            </div>

            <div class="col-md-4">

            <label for="especialidad_cita_persona">Edad</label>

            <input type="text" class="form-control" >

            </div>

        </div>

      </div>

     </div>

      <div class="modal-footer">

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="cerrarBtnActul">Cerrar</button>
          
      <button type="submit" class="btn btn-dark" data-dismiss="modal" id="botonAc">Generar</button>
          

      </div>

    </div>

</div>
