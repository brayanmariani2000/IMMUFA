<div class="row">
<div class="col-lg-5 mb-40">

<div class="card">

  <div class="card-body">

    <h4 class="card-title">Rango de Edades</h4>

      <h6 class="card-subtitle">Exportar datos Excel, PDF</h6>

        <div class="table-responsive m-t-40">

          <div id="example23_wrapper" class="dataTables_wrapper">

            <div id="example23_wrapper" class="dataTables_wrapper">

              <div class="dt-buttons">
                
                <a class="dt-button buttons-copy buttons-html5" tabindex="1" id="exxel_cita">

                  <span>Excel</span>

                </a>

                <a class="dt-button  buttons-html5" tabindex="1" aria-controls="example23" id="pdf_cita" href="#">

                  <span>PDF</span>
                
                </a>

              <div>


            </div>

            <table  class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;" id="tablaCita">

              <thead>

                <tr role="row">

                  <th class=""  rowspan="1" colspan="1">Rangos de Edades</th>

                  <th class=""  rowspan="1" colspan="1"style="width: 200px;">Cantidad</th>
                </tr>

              </thead>

              <tbody>

                <?php /// aqui va la cabezera 
                                                    
                                                    require_once "controlador/listarControlador.php";

                                                    $in_mini_paciente=new tablaControlador();

                                                    echo $in_mini_paciente->listar_edades_paciente_tabla_controlador();
                                             

                ?>

              </tbody>

            </table>

          </div>


        </div>

      </div>

    </div>

  </div>
                    
</div>
            
</div>
<div class="col-lg-7">
    
<div class="card">

                    <div class="col-md-12">
                    <h1>Cantidad de Pacientes por Rango de Edad</h1>
                    <div class="chart-wrapper">
                        <canvas id="donutChart"></canvas>
                        <div id="loading" class="loading">Cargando datos...</div>
                        <div id="error" class="error" style="display: none;"></div>
                    </div>
</div>
</div>
