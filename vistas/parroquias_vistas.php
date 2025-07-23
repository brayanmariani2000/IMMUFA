<div class="row">
    <div class="col-lg-8">
        <div class="card card-outline-info ">
            <div class="card-header m-b-10"><h4 class="m-b-0 text-white">Parroquia</h4></div>
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#nuevaParroquia" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Nueva Parroquia</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Parroquias" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Parroquias</span></a> </li>
        </ul>
                
                    <div class="tab-content">
                        <div class="tab-pane active" id="nuevaParroquia" role="tabpanel">
                            <form id="ParrouiaNew" class="form-bordered form-group">
                            <div class="form-group ">
                                <div class="m-t-10">
                                    <div class="col-lg-12">
                                        <h4 class="card-title">Nueva Parroquias</h4>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="municipio" >Municipio</label>
                                                        <select class="form-control" name="municipio" id="municipioInput">
                                                                <option value="0">--- ELIGE UN MUNICIPIO ---</option> 
                                                                <?php require_once './controlador/listarControlador.php'; $area=new listarControlador();$area->listar_municipio_controlador();?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="ParroquiaInput" >Parroquia</label>
                                                        <input type="text" class="form-control" id="ParroquiaInput" name="Parroquia" placeholder="Parroquia">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="ParroquiaBoton" class="text-white">hola</label>
                                                        <button type="submit" class="btn btn-info m-b-0 " id="ParroquiaBoton" >Registrar</button>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                    <div class="tab-pane p-20" id="Parroquias" role="tabpanel">
                        <div class="">
                            <div class="col-lg-12">
                                <div class="">
                                    <h4 class="card-title">Parroquias</h4>
                                    <div class="input-group col-md-6">
                                        <select class="form-control" name="municipio" id="municipio">
                                            <option value="0">--- ELIGE UN MUNICIPIO ---</option> 
                                            <?php require_once './controlador/listarControlador.php'; $area=new listarControlador();$area->listar_municipio_controlador();?>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-search"></i></span>
                                        </div>
                                    </div>
                                
                                    <div class="tabla-responsive">
                                        <table class=" table table-hover table-striped dataTable"  >
                                            <thead>
                                                <tr role="row">
                                                <th class=""  rowspan="1" colspan="1" style="width:8%;">N°</th>
                                                <th>Parroquias</th>
                                                <th><center>Acciones</center> </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaParroquia">
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
<!-- Modal Editar Parroquia -->
<div class="modal fade" id="modalEditarParroquia" tabindex="-1" role="dialog" aria-labelledby="modalEditarParroquiaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarParroquiaLabel">Editar Parroquia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarParroquia">
                <div class="modal-body">
                    <input type="hidden" id="idParroquiaEditar" name="idParroquia">
                    <div class="form-group">
                        <label for="nombreParroquiaEditar">Nombre de la Parroquia</label>
                        <input type="text" class="form-control" id="nombreParroquiaEditar" name="nombreParroquia" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="municipioParroquiaEditar" name="municipioParroquia" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>