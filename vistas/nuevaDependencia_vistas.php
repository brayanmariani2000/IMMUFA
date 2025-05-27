<div class="row">
    <div class="col-lg-8">
        <div class="card card-outline-info">
            <div class="card-header m-b-10"><h4 class="m-b-0 text-white">Dependencias</h4></div>
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#nuevaDependencias" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Nueva Dependencia</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tablaHorarios" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Dependencias</span></a> </li>
        </ul>
                
                    <div class="tab-content">
                        <div class="tab-pane active" id="nuevaDependencias" role="tabpanel">
                            <form id="nuevaDependecias" class="form-bordered form-group">
                                <div class="form-group ">
                                    <div class="">
                                        <div class="col-11">
                                            <h4 class="card-title">Nueva Dependencias</h4>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <label for="depedencia" >Dependencia</label>
                                                            <input type="text" class="form-control" id="nuevaDependencia" name="dependencia" placeholder="Nombre">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="d" class="text-white">hola</label>
                                                            <button type="submit" class="btn btn-info " id="dependenciaBT" >Registrar</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                    </div>
                 <div class="tab-pane p-20" id="tablaHorarios" role="tabpanel">
                    <div class="">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <h4 class="card-title">Dependencias</h4>
                                    <div class="tabla-responsive">
                                        <table class=" table table-hover table-striped  ">
                                            <thead>
                                                <tr role="row">
                                                <th class=""  rowspan="1" colspan="1" style="width:8%;">N°</th>
                                                <th>Dependencias</th>
                                                <th><center>Acciones</center> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                        require_once 'controlador/loginControlador.php';
                                        $list= new loginControlador();
                                        echo $list->listar_dependencia();
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
<div class="modal fade" id="modalEditarDependencia" tabindex="-1" role="dialog" aria-labelledby="modalEditarDependenciaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarDependenciaLabel">Editar Dependencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form id="formEditarDependencia">
                <div class="modal-body">
                    <input type="hidden" id="editarIdDependencia" name="id_dependencia">
                    <div class="form-group">
                        <label for="editarNombreDependencia">Nombre de la Dependencia</label>
                        <input type="text" class="form-control" id="editarNombreDependencia" name="nombre_dependencia" placeholder="Nombre de la Dependencia" required>
                    </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>