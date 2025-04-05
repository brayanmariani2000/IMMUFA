<div class="row">
    <div class="col-lg-8">
        <div class="card card-outline-info ">
            <div class="card-header m-b-10"><h4 class="m-b-0 text-white">Areas de Consultas</h4></div>
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#nuevaArea" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Nueva area de Consulta</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#areaConsulta" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Area de consulta</span></a> </li>
        </ul>
                
                    <div class="tab-content">
                    <div class="tab-pane active" id="nuevaArea" role="tabpanel">
                    <form id="areConNew" class="form-bordered form-group">
                    <div class="form-group ">
                        <div class="m-t-10">
                            <div class="col-lg-11">
                        <h4 class="card-title">Nueva Area de Consulta</h4>
                                        <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="depedencia" >Area de Consulta</label>
                                            <input type="text" class="form-control" id="nuevaAreaC" name="area" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-2">
                                        <label for="areaBT" class="text-white">hola</label>
                                        <button type="submit" class="btn btn-info m-b-0 " id="areaBT" >Registrar</button>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                    </form>
                 </div>
                 <div class="tab-pane p-20" id="areaConsulta" role="tabpanel">

                 <div class="">
                    <div class="col-lg-7">
            <div class="">
                <h4 class="card-title">Area De Consulta</h4>
                <div class="tabla-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered dataTable">
                        <thead>
                            <tr role="row">
                            <th class=""  rowspan="1" colspan="1" style="width:8%;">N°</th>
                            <th>Area De Consulta</th>
                            <th><center>Acciones</center> </th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                       require_once 'controlador/loginControlador.php';
                       $list= new loginControlador();
                       echo $list->tabla_area();
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

        </div>
    </div>
</div>