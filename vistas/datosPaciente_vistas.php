<div class="card border-0 shadow-lg">
    <!-- Encabezado principal -->
    <div class="card-header bg-success text-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-id-card-alt mr-2"></i>FICHA COMPLETA DEL PACIENTE
            </h4>
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


                    <?php include 'controlador/pacienteControlador.php';

                    $historial= new pacienteControlador;

                     echo   $historial->datosPacienteActualizar($_POST['verHistoria']);
                    ?>
                    
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
                    <?php  echo $historial->datosCitaActualizar($_POST['verHistoria']) ?>
                </div>
            </div>
        </div>

    </div>
</div>