<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <?php 
        include_once "./controlador/listarControlador.php";
        $card = new listarControlador();
        echo $card->listar_especialidades_card();
        ?> 
    </div>
    <!-- /# row -->
    
    <!-- Sección principal de contenido -->
    <div class="row p-t-40">
        <!-- Columna izquierda (8/12) -->
        <div class="col-lg-8">
            <!-- Panel de búsqueda y registro -->
            <div class="p-20">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a class="btn btn-info btn-block" id="registarPacienteInicio" href="formularioPaciente">
                            <i class="ti-plus"></i> Registrar Paciente
                        </a>
                    </div>   
                    
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Buscar paciente..." 
                                   aria-controls="example23" id="buscarPaciente">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="ti-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Área de resultados de búsqueda -->
            <div class="row" id='buscarTabla'></div>
        </div>

        <!-- Columna derecha (4/12) - Estadísticas de citas -->
        <div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Citas Diarias Por Especialidad</h4>
            <div id="citas-especialidades-container">
                <!-- Los datos se insertarán aquí dinámicamente -->
                <div class="text-center py-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                    <p>Cargando datos...</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <!-- /# row -->
    <!-- End PAge Content -->
</div>
<!-- End Container fluid -->
<!-- End footer -->
</div>