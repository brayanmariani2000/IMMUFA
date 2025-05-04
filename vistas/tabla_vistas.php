<div class="col-12 mb-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title mb-0">Citas</h4>
                <small class="card-subtitle">Pacientes registrados</small>
            </div>
            <div id="example23_filter" class="dataTables_filter">

                      <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23"></label>

                    </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaCitas" class="table table-hover table-striped align-middle" style="width:100%">
                    <thead class="">
                        <tr>
                            <th width="5%">N°</th>
                            <th width="20%">Nombre y Apellido</th>
                            <th width="10%">Cédula</th>
                            <th width="15%">Dirección</th>
                            <th width="10%">Discapacidad</th>
                            <th width="10%">Etnia</th>
                            <th width="5%">Edad</th>
                            <th width="15%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once 'controlador/loginControlador.php';
                            $tabla = new loginControlador();
                            echo $tabla->listar_cita();
                        ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Paginación mejorada -->
            <nav aria-label="Paginación de citas" class="mt-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <p class="text-center text-muted small">Mostrando 1 a 10 de 10 registros</p>
            </nav>
        </div>
    </div>
</div>

<!-- Modal para ver información del paciente -->
<div class="modal fade" id="veirInfoPaciente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-user-circle me-2"></i>Datos del Paciente
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="nombrePaciente"></p>
                            <label>Nombre</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="apellidoPaciente"></p>
                            <label>Apellido</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="cedulaPaciente"></p>
                            <label>Cédula</label>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="fechaNaciPaciente"></p>
                            <label>Fecha de Nacimiento</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="edadPaciente"></p>
                            <label>Edad</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="sexoPaciente"></p>
                            <label>Sexo</label>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="discapacidadPaciente"></p>
                            <label>Discapacidad</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="etniaPaciente"></p>
                            <label>Etnia</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="telefonoPaciente"></p>
                            <label>Teléfono</label>
                        </div>
                    </div>
                </div>
                
                <h5 class="text-center mb-3 border-top border-bottom py-2 bg-light">
                    <i class="fas fa-map-marker-alt me-2"></i>Dirección
                </h5>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="municipioPaciente"></p>
                            <label>Municipio</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="parroquiaPaciente"></p>
                            <label>Parroquia</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <p class="form-control-plaintext border-bottom" id="sectorPaciente"></p>
                            <label>Sector</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para actualizar información del paciente -->
<div class="modal fade" id="actualizarPaciente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-user-edit me-2"></i>Actualizar Datos del Paciente
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="actualizarPacienteFormulario" method="POST">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nombrePacienteActualizar" name="nombreActul" placeholder="Nombre">
                                <label for="nombrePacienteActualizar">Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="apellidoPacienteActualizar" name="apellidoActul" placeholder="Apellido">
                                <label for="apellidoPacienteActualizar">Apellido</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="cedulaPacienteActualizar" name="cedulaActul" placeholder="Cédula">
                                <label for="cedulaPacienteActualizar">Cédula</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaNaciPacienteActualizar" name="fechaNaciActul">
                                <label for="fechaNaciPacienteActualizar">Fecha de Nacimiento</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="edadPacienteActualizar" name="edadActul" placeholder="Edad">
                                <label for="edadPacienteActualizar">Edad</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select class="form-select" id="sexoPacienteActualizar" name="sexoActul">
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                </select>
                                <label for="sexoPacienteActualizar">Sexo</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select class="form-select" id="discapacidadPacienteActualizar" name="discapacidadActul">
                                    <option value="1">Motora</option>
                                    <option value="2">Auditiva</option>
                                    <option value="3">Visual</option>
                                    <option value="4">Mental</option>
                                </select>
                                <label for="discapacidadPacienteActualizar">Discapacidad</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select class="form-select" id="etniaPacienteActualizar" name="etniaActul">
                                    <?php require_once './controlador/listarControlador.php'; 
                                    $area = new listarControlador(); 
                                    $area->listar_etnias_controlador(); ?>
                                </select>
                                <label for="etniaPacienteActualizar">Etnia</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="telefonoPacienteActualizar" name="telefonoActul" placeholder="Teléfono">
                                <label for="telefonoPacienteActualizar">Teléfono</label>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="text-center mb-3 border-top border-bottom py-2 bg-light">
                        <i class="fas fa-map-marker-alt me-2"></i>Dirección
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="municipioPacienteActualizar" name="municipioActul">
                                    <?php $area->listar_municipio_controlador(); ?>
                                </select>
                                <label for="municipioPacienteActualizar">Municipio</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="parroquiaPacienteActualizar" name="parroquiaActul">
                                    <option value="">Seleccione una parroquia</option>
                                </select>
                                <label for="parroquiaPacienteActualizar">Parroquia</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>