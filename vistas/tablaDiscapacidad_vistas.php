<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Citas por espacialidad</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF &amp; Print</h6>
                                <div class="table-responsive m-t-40">
                                    <div id="example23_wrapper" class="dataTables_wrapper">
                                        <div id="example23_wrapper" class="dataTables_wrapper">
                                        </div>
                                            <div id="example23_filter" class="dataTables_filter">
                                            <label>Buscar:<input type="search" class="" placeholder="" aria-controls="example23"></label></div>
                                        <div>

                                        </div>
                                        <table id="example23" class="table table-hover table-responsive" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                            <th class=""  rowspan="1" colspan="1"style="width: 8px;">N°</th>
                                            <th class=""  rowspan="1" colspan="1"style="width: 131.8px;">Nombre y Apellido</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100.8px;">Cedula</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 191.8px;">Motivo de la cita</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 48.8px;">Dirrecion</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 92.8px;">Discapacidad</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 66.8px;">Tipo de Discapacidad</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 66.8px;">etnia</th>
                                            <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 92.8px;">accion</th>
                         
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                              require_once 'controlador/pacienteControlador.php';
                                              $list=new pacienteControlador();
                                               $list->mostrar_discapacitados();
                                            ?>
                                                                                       
                                           </tbody>
                                    </table>
                                    <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries

                                    </div>
                                </div>
                                <div class="dataTables_paginate paging_simple_numbers" id="example23_paginate">
                                <a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous">Previous</a>
                                <span><a class="paginate_button current" aria-controls="example23" data-dt-idx="1" tabindex="0">1</a>
                                <a class="paginate_button " aria-controls="example23" data-dt-idx="2" tabindex="0">2</a>
                                <a class="paginate_button " aria-controls="example23" data-dt-idx="3" tabindex="0">3</a>
                                <a class="paginate_button " aria-controls="example23" data-dt-idx="4" tabindex="0">4</a>
                                <a class="paginate_button " aria-controls="example23" data-dt-idx="5" tabindex="0">5</a>
                                <a class="paginate_button " aria-controls="example23" data-dt-idx="6" tabindex="0">6</a></span>
                                <a class="paginate_button next" aria-controls="example23" data-dt-idx="7" tabindex="0" id="example23_next">Next</a></div></div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>