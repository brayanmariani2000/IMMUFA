<div class="col-12 mb-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title mb-0">Citas</h4>
                <small class="card-subtitle">Pacientes registrados</small>
            </div>
            <div id="example23_filter" class="dataTables_filter">
                <label>Buscar:<input type="text" id="BuscarPacienteRegistro" class="" placeholder="" aria-controls="example23"></label>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive" id="tablaCitasPaciente" >
                <table class="table table-hover table-striped align-middle" style="width:100%">
                    <thead class="">
                        <tr>
                            <th width="5%">N°</th>
                            <th width="20%">Nombre y Apellido</th>
                            <th width="10%">Cédula</th>
                            <th width="10%">Discapacidad</th>
                            <th width="10%">Etnia</th>
                            <th width="10%">Edad</th>
                            <th width="15%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require_once 'controlador/loginControlador.php';
                        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                        $tabla = new loginControlador();
                        $resultados = $tabla->listar_cita($paginaActual);
                        
                        $contador = ($paginaActual - 1) * $resultados['paginacion']['registrosPorPagina'] + 1;
                        
                        foreach($resultados['datos'] as $row) {
                            $fechaNacimiento = new DateTime($row['fecha_nacimiento']);
                            $hoy = new DateTime();
                            $edad = $hoy->diff($fechaNacimiento)->y;
                        ?>
                        <tr>
                            <td><?php echo $contador; ?></td>
                            <td><?php echo htmlspecialchars($row['nombre'].' '.$row['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($row['cedula']); ?></td>
                            <td><?php echo htmlspecialchars($row['discapacidades']); ?></td>
                            <td><?php echo htmlspecialchars($row['etnias']); ?></td>
                            <td><?php echo $edad; ?> años</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <button type="button" class="btn btn-info btn-sm mx-1 ver-datos" 
                                            data-id="<?php echo $row['id_persona']; ?>"
                                            id="verDatos"
                                            title="Ver datos básicos">
                                        <i class="fas fa-user me-1"></i> Ver Datos
                                    </button>
                                    
                                    <button type="button" class="btn btn-warning btn-sm mx-1 editar-paciente" 
                                            data-id="<?php echo $row['id_persona']; ?>"
                                            id="editarPaciente"
                                            title="Editar información">
                                        <i class="fas fa-edit me-1"></i> Editar
                                    </button>
                                    
                                    <button type="submit" class="btn btn-success btn-sm mx-1" 
                                            form="formNuevaCita_<?php echo $row['id_persona']; ?>"
                                            title="Agendar nueva cita">
                                        <i class="fas fa-calendar-plus me-1"></i> Cita
                                    </button>
                                    <form id="formNuevaCita_<?php echo $row['id_persona']; ?>" 
                                          action="<?php echo SERVERURL."nuevaCita"; ?>" 
                                          method="POST" class="d-none">
                                        <input type="hidden" name="Nueva_Cita" value="<?php echo $row['id_persona']; ?>">
                                    </form>
                                    
                                    <button type="submit" class="btn btn-secondary btn-sm mx-1" 
                                            form="formHistorial_<?php echo $row['id_persona']; ?>"
                                            title="Ver historial médico">
                                        <i class="fas fa-history me-1"></i> Historial
                                    </button>
                                    <form id="formHistorial_<?php echo $row['id_persona']; ?>" 
                                          action="<?php echo SERVERURL."datosPaciente"; ?>" 
                                          method="POST" class="d-none">
                                        <input type="hidden" name="verHistoria" value="<?php echo $row['id_persona']; ?>">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $contador++;
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Paginación mejorada -->
            <nav aria-label="Paginación de citas" class="mt-3">
                <ul class="pagination justify-content-center">
                    <?php
                    $urlBase = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?page=tabla";
                    
                    // Botón Anterior
                    if ($paginaActual > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $urlBase ?>&pagina=<?= $paginaActual - 1 ?>">Anterior</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                    <?php endif;
                    
                    // Números de página
                    $inicioPaginas = max(1, $paginaActual - 2);
                    $finPaginas = min($resultados['paginacion']['totalPaginas'], $paginaActual + 2);
                    
                    for ($i = $inicioPaginas; $i <= $finPaginas; $i++): ?>
                        <li class="page-item <?= ($i == $paginaActual) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $urlBase ?>&pagina=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor;
                    
                    // Botón Siguiente
                    if ($paginaActual < $resultados['paginacion']['totalPaginas']): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $urlBase ?>&pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Siguiente</span>
                        </li>
                    <?php endif; ?>
                </ul>
                <p class="text-center text-muted small">
                    <?php
                    $inicio = (($paginaActual - 1) * $resultados['paginacion']['registrosPorPagina']) + 1;
                    $fin = min($paginaActual * $resultados['paginacion']['registrosPorPagina'], $resultados['paginacion']['totalRegistros']);
                    echo "Mostrando $inicio a $fin de ".$resultados['paginacion']['totalRegistros']." registros";
                    ?>
                </p>
            </nav>
        </div>
    </div>
</div>

<!-- Los modales (infoPacienteModal y actualizarPacienteModal) permanecen igual -->

<!-- Modal para ver información del paciente -->
<div class="modal fade" id="infoPacienteModal" tabindex="-1" aria-labelledby="infoPacienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Encabezado del Modal -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="infoPacienteModalLabel">
          <i class="fas fa-user-injured me-2"></i>Información Completa del Paciente
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
      </div>
      
      <!-- Cuerpo del Modal -->
      <div class="modal-body">
        <div class="container-fluid">
          <!-- Sección 1: Datos Personales -->
          <div class="row mb-4">
            <div class="col-md-12">
              <h6 class="border-bottom pb-2 mb-3 text-primary">
                <i class="fas fa-id-card me-2"></i>Datos Personales
              </h6>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold">Cédula</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-id-card"></i></span>
                <p class="form-control bg-light mb-0" id="modalCedula"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold">Nombre</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                <p class="form-control bg-light mb-0" id="modalNombre"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold">Apellido</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                <p class="form-control bg-light mb-0" id="modalApellido"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold">Fecha de Nacimiento</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-birthday-cake"></i></span>
                <p class="form-control bg-light mb-0" id="modalFechaNacimiento"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold">Edad</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user-clock"></i></span>
                <p class="form-control bg-light mb-0" id="modalEdad"></p>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <label class="form-label fw-bold">Teléfono</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                <p class="form-control bg-light mb-0" id="modalTelefono"></p>
              </div>
            </div>
          </div>
          
          <!-- Sección 2: Ubicación -->
          <div class="row mb-4">
            <div class="col-md-12">
              <h6 class="border-bottom pb-2 mb-3 text-primary">
                <i class="fas fa-map-marker-alt me-2"></i>Ubicación
              </h6>
            </div>
            
            
            <div class="col-md-3 mb-3">
              <label class="form-label fw-bold">Municipio</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-city"></i></span>
                <p class="form-control bg-light mb-0" id="modalMunicipio"></p>
              </div>
            </div>
            
            <div class="col-md-5 mb-3">
              <label class="form-label fw-bold">Parroquia</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-map-pin"></i></span>
                <p class="form-control bg-light mb-0" id="modalParroquia"></p>
              </div>
            </div>
          </div>
          
          <!-- Sección 3: Características -->
          <div class="row mb-4">
            <div class="col-md-12">
              <h6 class="border-bottom pb-2 mb-3 text-primary">
                <i class="fas fa-info-circle me-2"></i>Características
              </h6>
            </div>
            
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Etnia</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-users"></i></span>
                <p class="form-control bg-light mb-0" id="modalEtnia"></p>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Discapacidad</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-wheelchair"></i></span>
                <p class="form-control bg-light mb-0" id="modalDiscapacidad"></p>
              </div>
            </div>
          </div>
          
          <!-- Sección 4: Historial de Atenciones -->
          <div class="row">
            <div class="col-md-12">
              <h6 class="border-bottom pb-2 mb-3 text-primary">
                <i class="fas fa-history me-2"></i>Historial de Atenciones
              </h6>
            </div>
            
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Total de atenciones recibidas</h5>
                    <span class="badge bg-primary rounded-pill fs-5" id="modalTotalAtenciones">0</span>
                  </div>
                  
                  <div class="table-responsive">
                    <table class="table table-sm table-hover" id="tablaHistorial">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Especialidad</th>
                          <th>Médico</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody id="bodyHistorial">
                        <!-- Datos del historial se cargarán aquí -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pie del Modal -->
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
        <button type="button" class="btn btn-primary" id="btnImprimirInfo">
          <i class="fas fa-print me-2"></i>Imprimir
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para actualizar información del paciente -->
<div class="modal fade" id="actualizarPacienteModal" tabindex="-1" aria-labelledby="actualizarPacienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Encabezado del modal mejorado -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-semibold" id="actualizarPacienteLabel">
                    <i class="fas fa-user-edit me-2"></i>Actualizar Datos del Paciente
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <!-- Formulario con validación mejorada -->
            <form id="actualizarPacienteFormulario" method="POST" novalidate>
                <div class="modal-body">
                    <!-- Sección de datos personales -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3 border-bottom pb-2">
                            <i class="fas fa-id-card me-2"></i>Datos Personales
                        </h6>
                        
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombrePacienteActualizar" name="nombreActul" 
                                           placeholder="Nombre" required pattern="[A-Za-zÁ-ú\s]{2,}">
                                    <label for="nombrePacienteActualizar">Nombre</label>
                                    <div class="invalid-feedback">Por favor ingrese un nombre válido</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="apellidoPacienteActualizar" name="apellidoActul" 
                                           placeholder="Apellido" required pattern="[A-Za-zÁ-ú\s]{2,}">
                                    <label for="apellidoPacienteActualizar">Apellido</label>
                                    <div class="invalid-feedback">Por favor ingrese un apellido válido</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cedulaPacienteActualizar" name="cedulaActul" 
                                           placeholder="Cédula" required pattern="[0-9]{6,10}">
                                    <label for="cedulaPacienteActualizar">Cédula</label>
                                    <div class="invalid-feedback">Ingrese una cédula válida (6-10 dígitos)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de información demográfica -->
                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="fechaNaciPacienteActualizar" name="fechaNaciActul" required>
                                    <label for="fechaNaciPacienteActualizar">Fecha de Nacimiento</label>
                                    <div class="invalid-feedback">Seleccione una fecha válida</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="edadPacienteActualizar" name="edadActul" 
                                           placeholder="Edad" min="0" max="120" readonly>
                                    <label for="edadPacienteActualizar">Edad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                               
                                    <select class="form-control" id="sexoPacienteActualizar" name="sexoActul" required>
                                        <option value="" selected disabled>Seleccione...</option>
                                        <option value="1">Femenino</option>
                                        <option value="2">Masculino</option>
                                    </select>
                                    <label for="sexoPacienteActualizar">Sexo</label>
                                <div class="invalid-feedback">Seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de información adicional -->
                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-control" id="discapacidadPacienteActualizar" name="discapacidadActul">
                                        <option value="" selected disabled>Seleccione...</option>
                                        <option value="1">Motora</option>
                                        <option value="2">Auditiva</option>
                                        <option value="3">Visual</option>
                                        <option value="4">Mental</option>
                                        <option value="0">Ninguna</option>
                                    </select>
                                    <label for="discapacidadPacienteActualizar">Discapacidad</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-control" id="etniaPacienteActualizar" name="etniaActul" required>
                                        <?php require_once './controlador/listarControlador.php'; 
                                        $area = new listarControlador(); 
                                        $area->listar_etnias_controlador(); ?>
                                    </select>
                                    <label for="etniaPacienteActualizar">Etnia</label>
                                    <div class="invalid-feedback">Seleccione una opción</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="telefonoPacienteActualizar" name="telefonoActul" 
                                           placeholder="Teléfono" pattern="[0-9]{10,15}">
                                    <label for="telefonoPacienteActualizar">Teléfono</label>
                                    <div class="invalid-feedback">Ingrese un teléfono válido (10-15 dígitos)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de dirección con mejor jerarquía visual -->
                    <div class="border-top pt-3">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>Dirección
                        </h6>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                <label for="municipioPacienteActualizar">Municipio</label>
                                <div class="invalid-feedback">Seleccione un municipio</div>
                                    <select class="form-control" id="municipio" name="municipioActul" required>
                                        <?php $area->listar_municipio_controlador(); ?>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                <label for="parroquiaPacienteActualizar">Parroquia</label>
                                    <select class="form-control" id="Parroquia" name="parroquiaActul" required >
                                        <option>----selecione una opcion------</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pie del modal con botones mejorados -->
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para funcionalidades mejoradas -->