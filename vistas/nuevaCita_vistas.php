<?php 
require_once 'controlador/listarControlador.php'; 
$area = new listarControlador();
?>

<div class="row">
    <!-- Columna principal del formulario -->
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h4 class="mb-0 text-primary">
                    <i class="fas fa-user-injured mr-2"></i>DATOS DEL PACIENTE
                </h4>
            </div>
            
            <div class="card-body">
                <form method="POST" class="form-horizontal" id="paciente_cita_nueva">
                    <!-- Sección de Información Personal -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h5 class="mb-0">
                                <i class="fas fa-user-tag mr-2"></i>INFORMACIÓN PERSONAL
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                if(isset($_POST['Nueva_Cita'])){
                                    require_once "controlador/pacienteControlador.php";
                                    $actualizar = new pacienteControlador();
                                    echo $actualizar->datosPacienteActualizar($_POST['Nueva_Cita']);
                                }
                                ?> 
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Nueva Cita -->
                    <div class="card border-info">
                        <div class="card-header bg-info text-white py-2">
                            <h5 class="mb-0">
                                <i class="fas fa-calendar-plus mr-2"></i>NUEVA CITA
                            </h5>
                        </div>
                        
                        <div class="card-body">
                            <!-- Fila 1: Área y Dependencia -->
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label for="area_consultar" class="form-label">
                                        <i class="fas fa-clinic-medical mr-1"></i>Área a Consultar
                                    </label>
                                    <select name="area_consultar" id="area_consultar" class="form-control">
                                        <option value="0">--- SELECCIONE UNA OPCIÓN ---</option>
                                        <?php $area->listar_especialidad_controlador();?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="dependencia" class="form-label">
                                        <i class="fas fa-building mr-1"></i>Referencia
                                    </label>
                                    <select name="dependencia" id="dependencia" class="form-control">
                                        <option value="0">--- SELECCIONE UNA OPCIÓN ---</option>
                                        <?php $area->listar_dependencias_controlador();?>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Fila 2: Especialista y Fecha -->
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label for="especialista" class="form-label">
                                        <i class="fas fa-user-md mr-1"></i>Especialista
                                    </label>
                                    <select name="especialista" id="especialista" class="form-control">
                                        <option value="0">--- SELECCIONE UNA OPCIÓN ---</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3" id="fechaConsultaVerificar">
                                    <label for="fecha_consulta" class="form-label">
                                        <i class="fas fa-calendar-day mr-1"></i>Fecha de la Cita
                                    </label>
                                    <input type="date" name="fecha_consulta" id="fecha_consulta" class="form-control">
                                </div>
                            </div>
                            
                            <!-- Campos ocultos -->
                            <input type="hidden" name="usuario" id="usuarioRegistro" value="<?php echo $_SESSION['Usuario']?>">
                            <input type="hidden" name="paciente" id="idPaciente" value="<?php echo $_POST['Nueva_Cita']?>">
                            
                            <!-- Botón de envío -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary" id="paciente_cita">
                                    <i class="fas fa-check-circle mr-2"></i>Registrar Cita
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Columna de estadísticas -->
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                      <i class="fas fa-calendar-day text-primary mr-2 fs-4"></i>
                    <h4 class="card-title mb-0 ms-3">
                        Pacientes para hoy: 
                        <span id="diaAtencion" class="text-primary fw-bold"></span>
                    </h4>
                </div>
                
                <div id="DisponibilidadDia" class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">
                            <i class="fas fa-users mr-2 text-secondary"></i>Pacientes registrados:
                        </h5>
                        <span class="badge bg-primary rounded-pill px-3 py-2 fs-6">
                            <span id="cantidadPacienteXDia" class="text-white fw-bold">0</span>
                        </span>
                    </div>
                    
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" 
                             id="barraProgresoPacientes"
                             role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100"
                             style="width: 0%">
                        </div>
                    </div>
                    
                    <div class="mt-3 text-center small text-muted">
                        <i class="fas fa-info-circle mr-1"></i> Capacidad diaria de atención
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>