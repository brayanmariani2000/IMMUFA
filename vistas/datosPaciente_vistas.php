<div class="card border-0 shadow-lg">
    <!-- Encabezado principal -->
    <div class="card-header bg-success text-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-id-card-alt mr-2"></i>FICHA COMPLETA DEL PACIENTE
            </h4>
            <div>
                <button class="btn btn-light btn-sm mr-2">
                    <i class="fas fa-print mr-1"></i> Imprimir
                </button>
                <button class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt mr-1"></i> Editar
                </button>
            </div>
        </div>
    </div>

    <div class="card-body p-4">
        <!-- Sección Datos Personales -->
        <div class="card mb-4 border-primary">
            <div class="card-header bg-primary text-white py-2">
                <h5 class="mb-0">
                    <i class="fas fa-user-tag mr-2"></i>INFORMACIÓN PERSONAL
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Nombre -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-signature mr-2"></i>Nombres</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">Moraiza</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Apellido -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-signature mr-2"></i>Apellidos</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">Cabello</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cédula -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-id-card mr-2"></i>Cédula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-address-card text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">11776101</p>
                                <input type="hidden" name="usuario" id="cedula" value="11776101">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Teléfono -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-mobile-alt mr-2"></i>Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">4145678901</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fecha Nacimiento -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-birthday-cake mr-2"></i>Fecha Nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="far fa-calendar text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">15/03/1985</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edad -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-user-clock mr-2"></i>Edad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">39 años</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Historial de Citas -->
        <div class="card border-info">
            <div class="card-header bg-info text-white py-2">
                <h5 class="mb-0">
                    <i class="fas fa-calendar-medical mr-2"></i>HISTORIAL DE CITAS
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Especialidad -->
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="fas fa-stethoscope mr-2"></i>Especialidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-medal text-info"></i></span>
                                </div>
                                <p class="form-control bg-light">GINECOLOGIA</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Médico -->
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="fas fa-user-md mr-2"></i>Médico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user-tie text-info"></i></span>
                                </div>
                                <p class="form-control bg-light">BRANDO MARINAI</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Estado -->
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="fas fa-clipboard-check mr-2"></i>Estado</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-tasks text-info"></i></span>
                                </div>
                                <select class="form-control">
                                    <option value="1">AGENDADA</option>
                                    <option value="2">POSPUESTA</option>
                                    <option value="3">ATENDIDA</option>
                                    <option value="4">PERDIDA</option>
                                    <option value="5" selected>---SELECCIONE---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fecha Consulta -->
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="far fa-calendar-alt mr-2"></i>Fecha Consulta</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-clock text-info"></i></span>
                                </div>
                                <p class="form-control bg-light">2025-04-28</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Acciones -->
                    <div class="col-md-2 d-flex align-items-end mb-3">
                        <button class="btn btn-info btn-block" id="guardarCambiasCita" value="124">
                            <i class="fas fa-save mr-2"></i>Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-2"></i> Volver
            </button>
            <div>
                <button class="btn btn-outline-danger mr-2">
                    <i class="fas fa-trash-alt mr-2"></i> Eliminar
                </button>
                <button class="btn btn-success">
                    <i class="fas fa-file-medical mr-2"></i> Nueva Cita
                </button>
            </div>
        </div>
    </div>
</div>