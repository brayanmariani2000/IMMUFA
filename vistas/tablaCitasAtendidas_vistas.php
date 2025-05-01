
<div class="col-lg-12 mb-40" id="tabla_t">

    <div class="card">

      <div class="card-body">

        <h4 class="card-title">Citas Atendidas</h4>

          <h6 class="card-subtitle">Exportar datos Excel, PDF</h6>

            <div class="table-responsive m-t-40">

              <div id="example23_wrapper" class="dataTables_wrapper">

                <div id="example23_wrapper" class="dataTables_wrapper">

                  <div class="dt-buttons">
                    
                    <a class="dt-button buttons-copy buttons-html5" tabindex="1" id="exxel_cita">

                      <span>Excel</span>

                    </a>

                    <button id="pdf_cita" class="btn btn-primary">

                      <span>Generar PDF</span>
                    
                      </button>

                    <div id="example23_filter" class="dataTables_filter">

                      <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23"></label>

                    </div>

                  <div>


                </div>

                <table  class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;" id="tablaCita">

                  <thead>

                    <tr role="row">

                      <th class=""  rowspan="1" colspan="1">N°</th>

                      <th class=""  rowspan="1" colspan="1"style="width: 200px;" id='nombrePacientetabla'>Nombre y Apellido</th>

                      <th class="" style="width: 100.8px;" id='cedulaPacientetabla'>Cedula</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150.8px;">Area de Consulta</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150.8px;">Fecha Programada</th>

                      <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 10.8px;">Dependecias</th>


                    </tr>

                  </thead>

                  <tbody>

                    <?php /// aqui va la cabezera 
                                                        

                                                        require_once 'controlador/citaControlador.php';

                                                        $tabla=new citaControlador();

                                                        echo $tabla->mostrar_citas_atendidas();

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
          