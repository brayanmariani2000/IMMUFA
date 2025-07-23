<div class="row">
    <div class="col-lg-8">
        <div class="card card-outline-info ">
            <div class="card-header m-b-10"><h4 class="m-b-0 text-white">Etnias</h4></div>
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#nuevaEtnia" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Nueva Etnia</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Etnias" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Etnias</span></a> </li>
        </ul>
                
                    <div class="tab-content">
                        <div class="tab-pane active" id="nuevaEtnia" role="tabpanel">
                            <form id="EtniaNew" class="form-bordered form-group">
                                <div class="form-group ">
                                    <div class="m-t-10">
                                        <div class="col-lg-11">
                                            <h4 class="card-title">Nueva Etnia</h4>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="Etnia" >Etnia</label>
                                                    <input type="text" class="form-control" id="EtniaInput" name="Etnia" placeholder="Etnia">
                                                </div>
                                                <div class="col-md-2">
                                                <label for="EtniaBoton" class="text-white">hola</label>
                                                <button type="submit" class="btn btn-info m-b-0 " id="EtniaBoton" >Registrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                         <div class="tab-pane p-20" id="Etnias" role="tabpanel">

                            <div class="">
                                <div class="col-lg-12">
                                    <div class="">
                                        <h4 class="card-title">Etnias</h4>
                                            <div class="tabla-responsive">
                                                <table class=" table table-hover table-striped dataTable">
                                                    <thead>
                                                        <tr role="row">
                                                        <th class=""  rowspan="1" colspan="1" style="width:8%;">N°</th>
                                                        <th>Etnias</th>
                                                        <th><center>Acciones</center> </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    require_once 'controlador/listarControlador.php';
                                                    $list= new listarControlador();
                                                    echo $list->listar_etnia_controlador_tabla();
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
<div class="modal fade" id="modalEditarEtnia" tabindex="-1" role="dialog" aria-labelledby="modalEditarEtniaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarEtniaLabel">Editar Etnia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarEtnia">
                <div class="modal-body">
                    <input type="hidden" id="idEtniaEditar" name="idEtnia">
                    <div class="form-group">
                        <label for="nombreEtniaEditar">Nombre de la Etnia</label>
                        <input type="text" class="form-control" id="nombreEtniaEditar" name="nombreEtnia" required>
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