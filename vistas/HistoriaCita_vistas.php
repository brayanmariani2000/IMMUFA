<div class="col-12 mb-4" id="tabla_t">
    <div class="card shadow-sm">
        <div class="card-header  text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title mb-0">Historial de Citas</h4>
                    <h6 class="card-subtitle mb-0 text-white-50">Exportar datos a Excel, PDF</h6>
                </div>
                <div class="btn-group">
                <span class="input-group-text bg-light">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Buscar paciente..." id="buscarPacienteHistorial">
                </div>
            </div>
        </div>
        

            <div class="table-responsive">
                <table class="table table-striped  table-bordered" id="historialCitaTotal">
                    <thead class="">
                        <tr>
                            <th width="5%">N°</th>
                            <th>Nombre y Apellido</th>
                            <th>Cédula</th>
                            <th>Especialidad</th>
                            <th>Especialista</th>
                            <th>Fecha Atención</th>
                            <th>Fecha Registro</th>
                            <th>Funcionario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once 'controlador/citaControlador.php';
                        $tablaH = new citaControlador();
                        echo $tablaH->Historia_cita_controlador();
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="dataTables_info" id="historialInfo">
                        Mostrando 1 a 10 de 100 registros
                    </div>
                </div>
                <div class="col-md-6">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Anterior</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>