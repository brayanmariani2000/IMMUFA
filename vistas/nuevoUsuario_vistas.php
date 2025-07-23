<div class="row">
    <div class="col-lg-10">
        <div class="card card-outline-primary">
            <div class="card-header m-b-10">
                <h4 class="m-b-0 text-white">Gestión de Usuarios</h4>
            </div>
            
            <div class="card-body">
                <!-- Pestañas -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#nuevoUsuario" role="tab">
                            <i class="ti-home hidden-sm-up"></i>
                            <span class="hidden-xs-down">Nuevo usuario</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Usuariosver" role="tab">
                            <i class="ti-user hidden-sm-up"></i>
                            <span class="hidden-xs-down">Usuarios</span>
                        </a>
                    </li>
                </ul>
                
                <!-- Contenido de pestañas -->
                <div class="tab-content">
                    <!-- Pestaña Nuevo Usuario -->
                    <div class="tab-pane active m-b-10" id="nuevoUsuario" role="tabpanel">
                        <div class="col-12">
                            <div class="m-t-10">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">Nuevo usuario</h4>
                                </div>
                                
                                <div class="card-body m-t-10">
                                    <form id="registrarUsuario" method="POST" class="form-bordered">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="nombreUsuario">Nombre</label>
                                                    <input class="form-control" id="nombreUsuario" type="text" placeholder="Nombre" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="apellidoUsuario">Apellido</label>
                                                    <input class="form-control" id="apellidoUsuario" type="text" placeholder="Apellido" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="cedulaUsuario">Cédula</label>
                                                    <input class="form-control" id="cedulaUsuario" type="text" placeholder="Cédula" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="telefonoUsuario">Teléfono</label>
                                                    <input class="form-control" id="telefonoUsuario" type="text" placeholder="Teléfono" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="sexo">Sexo</label>
                                                    <select name="sexo" id="sexo" class="form-control" required>
                                                        <option value="1">FEMENINO</option>
                                                        <option value="2">MASCULINO</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="idUsuario">Nombre de Usuario</label>
                                                    <input class="form-control" id="idUsuario" type="text" placeholder="Nombre de Usuario" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="clave">Contraseña</label>
                                                    <input class="form-control" id="clave" type="password" placeholder="Contraseña" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="rol">Privilegios</label>
                                                <select name="rol_usu" id="rol" class="form-control" required>
                                                    <?php require_once 'controlador/listarControlador.php'; 
                                                    $lista = new listarControlador(); 
                                                    echo $lista->listar_roles(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="offset-sm-3 col-md-9">
                                                <button type="submit" class="btn btn-primary" id="registrarUsuariobt">
                                                    <i class="fa fa-check"></i> Registrar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pestaña Lista de Usuarios -->
                    <div class="tab-pane p-20" id="Usuariosver" role="tabpanel">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title">Usuarios</h4>
                                <div class="table-responsive">
                                    <table class="display nowrap table table-hover table-striped ">
                                        <thead>
                                            <tr role="row">
                                                <th>Nombre y Apellido</th>
                                                <th>Usuario</th>
                                                <th>Permisos</th>
                                                <th><center>Acciones</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php require_once 'controlador/listarControlador.php'; 
                                            $list = new tablaControlador(); 
                                            echo $list->tabla_usuario_controlador(); ?>
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

<!-- Modal para ver información del usuario -->
<div class="modal fade" id="modalInfoUsuario" tabindex="-1" role="dialog" aria-labelledby="modalInfoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <!-- Encabezado del Modal -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalInfoUsuarioLabel">
                    <i class="fas fa-user-tie mr-2"></i>Información Completa del Usuario
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- Cuerpo del Modal -->
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Columna Izquierda -->
                    <div class="col-md-6">
                        <!-- Tarjeta de Datos Personales -->
                        <div class="card mb-4 border-primary">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0"><i class="fas fa-user-circle mr-2"></i>Datos Personales</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user mr-2 text-primary"></i> <strong>Nombre:</strong></span>
                                        <span id="modalNombreUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user-tag mr-2 text-primary"></i> <strong>Apellido:</strong></span>
                                        <span id="modalApellidoUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-id-card mr-2 text-primary"></i> <strong>Cédula:</strong></span>
                                        <span id="modalCedulaUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-phone mr-2 text-primary"></i> <strong>Teléfono:</strong></span>
                                        <span id="modalTelefonoUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-envelope mr-2 text-primary"></i> <strong>Correo:</strong></span>
                                        <span id="modalCorreoUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tarjeta de Dirección -->
                        <div class="card border-info">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0"><i class="fas fa-map-marked-alt mr-2"></i>Dirección</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-city mr-2 text-info"></i> <strong>Municipio:</strong></span>
                                        <span id="modalMunicipioUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-map-marker-alt mr-2 text-info"></i> <strong>Parroquia:</strong></span>
                                        <span id="modalParroquiaUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha -->
                    <div class="col-md-6">
                        <!-- Tarjeta de Información Adicional -->
                        <div class="card mb-4 border-success">
                            <div class="card-header bg-success text-white">
                                <h6 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Información Adicional</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-birthday-cake mr-2 text-success"></i> <strong>Fecha Nacimiento:</strong></span>
                                        <span id="modalFechaNacimientoUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-venus-mars mr-2 text-success"></i> <strong>Sexo:</strong></span>
                                        <span id="modalSexoUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-users mr-2 text-success"></i> <strong>Etnia:</strong></span>
                                        <span id="modalEtniaUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-wheelchair mr-2 text-success"></i> <strong>Discapacidad:</strong></span>
                                        <span id="modalDiscapacidadUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tarjeta de Datos de Acceso -->
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="mb-0"><i class="fas fa-user-shield mr-2"></i>Datos de Acceso</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user-tie mr-2 text-warning"></i> <strong>Rol:</strong></span>
                                        <span id="modalRolUsuario" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-passport mr-2 text-warning"></i> <strong>Contraseña:</strong></span>
                                        <span id="modalUsernameClave" class="badge badge-light badge-pill">No disponible</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user-check mr-2 text-warning"></i> <strong>Usuario:</strong></span>
                                        <span id="modalUsernameUsuario" class="badge badge-light badge-pill">No disponible</span>
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
<div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalActualizarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <!-- Encabezado del Modal -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalActualizarUsuarioLabel">
                    <i class="fas fa-user-edit mr-2"></i>Actualizar Datos del Usuario
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- Formulario de Actualización -->
            <form id="formActualizarUsuario" method="POST">
                <div class="modal-body p-4">
                    <div class="row">
                        <!-- Columna Izquierda -->
                        <div class="col-md-6">
                            <!-- Tarjeta de Datos Personales -->
                            <div class="card mb-4 border-primary">
                                <div class="card-header bg-primary text-white">
                                    <h6 class="mb-0"><i class="fas fa-user-circle mr-2"></i>Datos Personales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="actualizarNombres"><i class="fas fa-user mr-2 text-primary"></i> Nombres</label>
                                        <input type="text" class="form-control" id="actualizarNombres" name="nombres" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarApellido"><i class="fas fa-user-tag mr-2 text-primary"></i> Apellido</label>
                                        <input type="text" class="form-control" id="actualizarApellido" name="apellido" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarCedula"><i class="fas fa-id-card mr-2 text-primary"></i> Cédula</label>
                                        <input type="text" class="form-control" id="actualizarCedula" name="cedula" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarTelefono"><i class="fas fa-phone mr-2 text-primary"></i> Teléfono</label>
                                        <input type="tel" class="form-control" id="actualizarTelefono" name="telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarCorreo"><i class="fas fa-envelope mr-2 text-primary"></i> Correo</label>
                                        <input type="email" class="form-control" id="actualizarCorreo" name="correo" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta de Dirección -->
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h6 class="mb-0"><i class="fas fa-map-marked-alt mr-2"></i>Dirección</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="actualizarMunicipio"><i class="fas fa-city mr-2 text-info"></i> Municipio</label>
                                        <select class="form-control" id="municipio" name="municipio">
                                        <option value="">Seleccione una opción</option>
                                        <?php  $area = new listarControlador();  
                                        $area->listar_municipio_controlador(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Parroquia"><i class="fas fa-map-marker-alt mr-2 text-info"></i> Parroquia</label>
                                        <select class="form-control" id="Parroquia"  name="parroquia">
                                         <option value="">Seleccione una opción</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="col-md-6">
                            <!-- Tarjeta de Información Adicional -->
                            <div class="card mb-4 border-success">
                                <div class="card-header bg-success text-white">
                                    <h6 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Información Adicional</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="actualizarFechaNacimiento"><i class="fas fa-birthday-cake mr-2 text-success"></i> Fecha Nacimiento</label>
                                        <input type="date" class="form-control" id="actualizarFechaNacimiento" name="fecha_nacimiento">
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarSexo"><i class="fas fa-venus-mars mr-2 text-success"></i> Sexo</label>
                                        <select class="form-control" id="actualizarSexo" name="sexo">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarEtnia"><i class="fas fa-users mr-2 text-success"></i> Etnia</label>
                                        <select class="form-control" id="actualizarEtnia" name="etnia">
                                            <?php
                                            $area->listar_etnias_controlador(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarDiscapacidad"><i class="fas fa-wheelchair mr-2 text-success"></i> Discapacidad</label>
                                        <select class="form-control" id="actualizarDiscapacidad" name="discapacidad">
                                            <option value="" selected disabled>Seleccione...</option>
                                            <option value="1">Motora</option>
                                            <option value="2">Auditiva</option>
                                            <option value="3">Visual</option>
                                            <option value="4">Mental</option>
                                            <option value="0">Ninguna</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta de Datos de Acceso -->
                            <div class="card border-warning">
                                <div class="card-header bg-warning text-dark">
                                    <h6 class="mb-0"><i class="fas fa-user-shield mr-2"></i>Datos de Acceso</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="actualizarRol"><i class="fas fa-user-tie mr-2 text-warning"></i> Rol</label>
                                        <select class="form-control" id="actualizarRol" name="rol" required>
                                            <?php echo $lista->listar_roles();  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarUsername"><i class="fas fa-user-check mr-2 text-warning"></i> Usuario</label>
                                        <input type="text" class="form-control" id="actualizarUsername" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="actualizarPassword"><i class="fas fa-key mr-2 text-warning"></i> Nueva Contraseña (opcional)</label>
                                        <input type="text" class="form-control" id="actualizarClave" name="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pie del Modal -->
                <div class="modal-footer bg-light">
                    <input type="hidden" id="actualizarUsuarioId" name="id_usuario">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
