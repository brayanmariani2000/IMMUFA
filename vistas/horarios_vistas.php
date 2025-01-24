<div class="row">
    <div class="col-9">
        <div class="card">
            <div class="card-header"><h4>Horarios</h4></div>
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#horarios" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Agendar Horarios</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tablaHorarios" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Horarios</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#actualizarHorarios" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Actualizar Horarios</span></a></li>
        </ul>
                
                    <div class="tab-content">
                    <div class="tab-pane active" id="horarios" role="tabpanel">
                    <form action="" class="form-bordered form-group">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="dia">Dia</label>
                            <select class="form-control" name="dia" id="dia">
                          <?php include_once "./controlador/listarControlador.php";$horarios= new listarControlador();echo $horarios->listar_dias_controlador(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="turno">Turno</label>
                            <select class="form-control" name="turno" id="turno">
                           <?php echo $horarios->listar_turno_controlador(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="medico">Medico</label>
                            <select class="form-control" name="medico" id="medico">
                           <?php echo $horarios->listar_medico_controlador();?>
                            </select>
                        </div>
                        </div>
                        <div class="m-l-0 col-md-9">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Registrar</button>
                         </div>
                          
                   
                    </form>
                 </div>
                 <div class="tab-pane p-20" id="tablaHorarios" role="tabpanel">
                 <div class="card">
            <div class="card-body">
                <h4 class="card-title">Horarios</h4>
                <div class="tabla-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered dataTable">
                        <thead>
                            <tr role="row">
                            <th class=""  rowspan="1" colspan="1" style="width:8%;">N°</th>
                            <th>Especialidad</th>
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
                 <div class="tab-pane p-20" id="actualizarHorarios" role="tabpanel">

                </div>
              

                </div>
                
            </div>

        </div>
    </div>
</div>