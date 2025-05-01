<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Gestion de Medicos</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab2" role="tablist" style="border-bottom: 1px solid #1976d2;">
                    <li class="nav-item"> 
                        <a class="nav-link active" data-toggle="tab" href="#Datos_personales" role="tab">
                            <span class="hidden-sm-up"><i class="ti-user"></i></span> 
                            <span class="hidden-xs-down">Registrar Medicos</span>
                        </a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#Medicos" role="tab">
                            <span class="hidden-sm-up"><i class="ti-home"></i></span> 
                            <span class="hidden-xs-down">Medicos</span>
                        </a> 
                    </li>
                </ul>
           
                <form class="form-bordered" id="medicoRegistro">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- inicio de la seccion de datos personales-->
                        <div class="tab-pane active" id="Datos_personales" role="tabpanel">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="cedula">Cedula</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono">Telefono</label> 
                                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="correo">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" name="fecha_naci" id="fecha_naci" placeholder="fecha_naci">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sexo_m">Genero</label>
                                        <select name="sexo_m" id="sexo_m" class="form-control">
                                            <option value="1">FEMENINO</option>
                                            <option value="2">MASCULINO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="especialidad">Especialidad</label>
                                    <select class="form-control" id="especialidadM">
                                        <?php require_once './controlador/listarControlador.php';$area=new listarControlador();$area->listar_especialidad_controlador();?>
                                    </select>
                                </div>
                                                                        
                                <div class="col-md-6">
                                    <label for="correo">Correo</label>
                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="correo">
                                </div>

                                <div class="offset-sm-3 col-md-9">
                                    <button type="submit" class="btn btn-primary" id="resgistrarMedico">
                                        <i class="fa fa-check"></i> Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- inicio de la seccion de direccion-->
                    <div class="tab-pane p-20" id="Medicos" role="tabpanel">
                        <div class="">
                            <div class="">
                                <h4 class="card-title">Medicos</h4>
                                <div class="tabla-responsive">
                                    <table class="display nowrap table table-hover table-striped table-bordered dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th>Nombre y Apellido</th>
                                                <th>Especialidad</th>
                                                <th><center>Acciones</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $list= new tablaControlador(); echo $list->tabla_medico_controlador();?>
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

<!-- Modal para ver información del médico -->
<div class="modal fade" id="modalInfoMedico" tabindex="-1" role="dialog" aria-labelledby="modalInfoMedicoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <!-- Encabezado del Modal -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalInfoMedicoLabel">
                    <i class="fas fa-user-md mr-2"></i>Información Completa del Médico
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- Cuerpo del Modal -->
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Columna Izquierda - Datos Personales -->
                    <div class="col-md-6">
                        <div class="card mb-4 border-primary">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0"><i class="fas fa-id-card mr-2"></i>Datos Personales</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user mr-2 text-primary"></i> <strong>Nombre:</strong></span>
                                        <span id="modalNombre" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user-tag mr-2 text-primary"></i> <strong>Apellido:</strong></span>
                                        <span id="modalApellido" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-id-card mr-2 text-primary"></i> <strong>Cédula:</strong></span>
                                        <span id="modalCedula" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-birthday-cake mr-2 text-primary"></i> <strong>Fecha Nacimiento:</strong></span>
                                        <span id="modalFechaNacimiento" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-venus-mars mr-2 text-primary"></i> <strong>Género:</strong></span>
                                        <span id="modalGenero" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-passport mr-2 text-primary"></i> <strong>Nacionalidad:</strong></span>
                                        <span id="modalNacionalidad" class="font-weight-bold">-</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha - Datos Profesionales y Contacto -->
                    <div class="col-md-6">
                        <div class="card mb-4 border-success">
                            <div class="card-header bg-success text-white">
                                <h6 class="mb-0"><i class="fas fa-briefcase-medical mr-2"></i>Datos Profesionales</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user-md mr-2 text-success"></i> <strong>Especialidad:</strong></span>
                                        <span id="modalEspecialidad" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-check-circle mr-2 text-success"></i> <strong>Estado:</strong></span>
                                        <span id="modalStatus" class="font-weight-bold">-</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card border-info">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0"><i class="fas fa-address-book mr-2"></i>Información de Contacto</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-phone mr-2 text-info"></i> <strong>Teléfono:</strong></span>
                                        <span id="modalTelefono" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-envelope mr-2 text-info"></i> <strong>Correo:</strong></span>
                                        <span id="modalCorreo" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-map-marker-alt mr-2 text-info"></i> <strong>Ubicación:</strong></span>
                                        <span id="modalUbicacion" class="font-weight-bold">-</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección Inferior - Información Adicional -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="mb-0"><i class="fas fa-users mr-2"></i>Información Adicional</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-users mr-2 text-warning"></i> <strong>Etnia:</strong></span>
                                        <span id="modalEtnia" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-wheelchair mr-2 text-warning"></i> <strong>Discapacidad:</strong></span>
                                        <span id="modalDiscapacidad" class="font-weight-bold">-</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-calendar-check mr-2 text-warning"></i> <strong>Edad:</strong></span>
                                        <span id="modalEdad" class="font-weight-bold">-</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pie del Modal -->
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
