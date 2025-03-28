<script src="<?php  echo SERVERURL?>vistas/plantillas/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/weather/jquery.simpleWeather.min.js"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/Chart.bundle.js"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chartist/chartist.min.js"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/chartjs-init.js"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/chart-js/direccionPacientes.js"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/echarts.js"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/lib/echart/echarts-init.js"></script>
    <!--Custom JavaScript -->
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/custom.min.js"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/alerta.js" type="module"></script>
    
    <script src="<?php echo SERVERURL ?>vistas/plantillas/js/aciones/inicio_secion.js" type="module"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/popper.min.js" ></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/sweetalert2.all.min.js"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/paciente.js" type="module"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/usuario.js" type="module"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/dependencia.js" type="module"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/especialidad.js" type="module"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/medico.js" type="module"></script>
    
    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/buscaPaciente.js" type="module"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/validacion.js" type="module"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/pdf.js" type="module"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/peticionCantidadPaaciente.js" type="module"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/validacionFormulario.js" type="module"></script>

    <script src="<?php echo SERVERURL?>vistas/plantillas/js/aciones/reportes.js" type="module"></script>

    <script type="text/javascript" src="<?php echo SERVERURL ?>vistas/plantillas/js/lightbox.js"></script>
	
    <script type="text/javascript" src="<?php echo SERVERURL ?>vistas/plantillas/js/isotope.pkgd.min.js"></script>
	
    <script type="text/javascript" src="<?php echo SERVERURL ?>vistas/plantillas/js/jquery.flexslider.js"></script>
	
    <script type="text/javascript" src="<?php echo SERVERURL ?>vistas/plantillas/js/jquery.rateyo.js"></script>


    <?php require_once "./controlador/vistasControlador.php";

$iv=new vistasControlador();

$vistas=$iv->obtener_vistas_controlador();

$listablanca1=['home','404','login',];

if (in_array($vistas,$listablanca1) ) {

     echo '<script type="text/javascript" src="'.SERVERURL .'vistas/plantillas/css/materialize/js/materialize.js"></script>

    <script type="text/javascript" src="'.SERVERURL .'vistas/plantillas/css/materialize/js/materialize.min.js"></script>';

}
    
?>





