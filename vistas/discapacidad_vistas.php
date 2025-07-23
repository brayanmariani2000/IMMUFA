<div class="row">
    <div class="col-lg-8">
        <div class="card card-outline-info ">
            <div class="card-header m-b-10"><h4 class="m-b-0 text-white">Discapacidad</h4></div>
            <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#nuevaDiscapacidad" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Nueva Discapacidad</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#discapacidades" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Discapacidades</span></a> </li>
        </ul>
                
                    <div class="tab-content">
                        <div class="tab-pane active" id="nuevaDiscapacidad" role="tabpanel">
                            <form id="DiscapacidadNew" class="form-bordered form-group">
                                <div class="form-group ">
                                    <div class="m-t-10">
                                        <div class="col-lg-11">
                                            <h4 class="card-title">Nueva Discapacidad</h4>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <label for="discapacidad" >Discapacidad</label>
                                                            <input type="text" class="form-control" id="discapaciadInput" name="discapacidad" placeholder="Discapaciadad">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="discapcidadBoton" class="text-white">hola</label>
                                                            <button type="submit" class="btn btn-info m-b-0 " id="discapcidadBoton" >Registrar</button>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <div class="tab-pane p-20" id="discapacidades" role="tabpanel">

                        <div class="">
                            <div class="col-lg-12">
                                <div class="">
                                    <h4 class="card-title">Discapacidades</h4>
                                        <div class="tabla-responsive">
                                            <table class=" table table-hover table-striped dataTable">
                                                <thead>
                                                    <tr role="row">
                                                    <th class=""  rowspan="1" colspan="1" style="width:8%;">N°</th>
                                                    <th>Discapacidades</th>
                                                    <th><center>Acciones</center> </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                            require_once 'controlador/listarControlador.php';
                                            $list= new listarControlador();
                                            echo $list->listar_discapacidad_controlador_tabla();
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
<!-- Modal Editar Discapacidad -->
<div class="modal fade" id="modalEditarDiscapacidad" tabindex="-1" role="dialog" aria-labelledby="modalEditarDiscapacidadLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarDiscapacidadLabel">Editar Discapacidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarDiscapacidad">
                <div class="modal-body">
                    <input type="hidden" id="idDiscapacidadEditar" name="idDiscapacidad">
                    <div class="form-group">
                        <label for="nombreDiscapacidadEditar">Nombre de la Discapacidad</label>
                        <input type="text" class="form-control" id="nombreDiscapacidadEditar" name="nombreDiscapacidad" required>
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