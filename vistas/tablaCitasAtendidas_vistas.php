
<div class="col-lg-12 mb-40" id="tabla_t">

    <div class="card">

      <div class="card-body">

        <h4 class="card-title">Citas Atendidas</h4>

          <h6 class="card-subtitle">Exportar datos Excel, PDF</h6>

            <div class="table-responsive m-t-40">

              <div id="example23_wrapper" class="dataTables_wrapper">

                <div id="example23_wrapper" class="dataTables_wrapper">

                  <div class="dt-buttons">
                    

                  <a id="pdf_cita" href="#" class="btn btn-info position-relative text-decoration-none">
                      <i class="fas fa-file-pdf me-2"></i>
                      Generar PDF
                    </a>

                    <div id="example23_filter" class="dataTables_filter">

                      <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23"></label>

                    </div>

                  <div>


                </div>

                <table  class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;" id="tablaCita">

                  <thead>

                  <tr>
                    <!-- Columna N° -->
                    <th class="text-center" style="width: 5%; min-width: 50px;">N°</th>
                    
                    <!-- Columna Nombre y Apellido -->
                    <th class="text-start" style="width: 25%; min-width: 250px;" id='nombrePacientetabla'>
                      <i class="fas fa-user me-2"></i>Nombre y Apellido
                    </th>
                    
                    <!-- Columna Cédula -->
                    <th class="text-center" style="width: 15%; min-width: 150px;" id='cedulaPacientetabla'>
                      <i class="fas fa-id-card me-2"></i>Cédula
                    </th>
                    
                    <!-- Columna Área de Consulta -->
                    <th class="text-start" style="width: 20%; min-width: 200px;">
                      <i class="fas fa-stethoscope me-2"></i>Área de Consulta
                    </th>
                    
                    <!-- Columna Fecha Programada -->
                    <th class="text-center" style="width: 20%; min-width: 180px;">
                      <i class="far fa-calendar-alt me-2"></i>Fecha Programada
                    </th>
                    
                    <!-- Columna Dependencias -->
                    <th class="text-start" style="width: 20%; min-width: 200px;">
                      <i class="fas fa-building me-2"></i>Dependencias
                    </th>
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
          