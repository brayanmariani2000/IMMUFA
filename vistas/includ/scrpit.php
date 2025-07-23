<!-- Librerías base (jQuery, Bootstrap, etc.) -->
<script src="<?php echo SERVERURL?>vistas/plantillas/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/scrollable/jquery.slimscroll.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/popper.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/sweetalert2.all.min.js"></script>

<!-- Librerías de gráficos -->
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chartist/chartist.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/Chart.bundle.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/echarts.js"></script>

<!-- Scripts personalizados -->
<script src="<?php echo SERVERURL?>vistas/plantillas/js/sidebarmenu.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/custom.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/isotope.pkgd.min.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/scripts.min.js"></script>

<!-- Inicializadores de gráficos -->
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/chartjs-init.js"></script>
<script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/echarts-init.js"></script>
    
    
   <!--graficas para ver -->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/direccionPacientes.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/donaEdades.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/dependeciasDonus.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/direccionesDonus.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/citasDonus.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/chartDiscapacidad.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/chartEtnias.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/echarts.js"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/edades.js"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/echarts-init.js"></script>


    <!--Acciones del sistema ejemplo (modales,validacion de formulario, buscador, ) -->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/alerta.js" type="module"></script>
    <script src="<?php echo SERVERURL ?>vistas/plantillas/js/aciones/inicio_secion.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/paciente.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/usuario.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/dependencia.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/especialidad.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/actualizarPorFehas.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/medico.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/buscaPaciente.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/validacion.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/pacientesDiarios.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/peticionCantidadPaacient.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/validacionFormulario.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/reportes.js" type="module"></script>  
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/configuracion.js" type="module"></script>

    <!------reportes  ------->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/pdf.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/pdf2.js" type="module"></script>
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/pdf3.js" type="module"></script>
	

    <?php require_once "./controlador/vistasControlador.php";
    $iv=new vistasControlador();
    $vistas=$iv->obtener_vistas_controlador();
    $listablanca1=['home','login',];
    if (in_array($vistas,$listablanca1) ) {
        echo '<script type="text/javascript" src="'.SERVERURL .'vistas/plantillas/css/materialize/js/materialize.js"></script>';
        echo'<script type="text/javascript" src="'.SERVERURL .'vistas/plantillas/css/materialize/js/materialize.min.js"></script>';
    }
    ?>





