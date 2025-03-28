<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?php echo com;?></title>

    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/lib/chartist/chartist.min.css" rel="stylesheet">

    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/lib/alertas/sweetalert/sweetalert.css" rel="stylesheet">

	<link href="<?php echo SERVERURL;?>vistas/plantillas/css/lib/owl.carousel.min.css" rel="stylesheet">

    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/lib/owl.theme.default.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/helper.css" rel="stylesheet">

    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/style.css" rel="stylesheet">
    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/stilo.css" rel="stylesheet">
    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo SERVERURL;?>vistas/plantillas/css/form.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/jquery.rateyo.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>css/input.css"/>
    <?php require_once "./controlador/vistasControlador.php";

$iv=new vistasControlador();

$vistas=$iv->obtener_vistas_controlador();

$listablanca1=['home','404','login',];

if (in_array($vistas,$listablanca1) ) {

     echo '<link rel="stylesheet" type="text/css" href="'.SERVERURL.'vistas/plantillas/css/materialize/css/materialize.css"/>';

}
$iv2=new vistasControlador();

$vistas=$iv2->obtener_vistas_controlador();

$listablanca1=['login'];

if (in_array($vistas,$listablanca1) ) {

     echo '<link href="'.SERVERURL.'vistas/plantillas/css/estilos.css" rel="stylesheet">';
     echo '<link rel="stylesheet" type="text/css" href="'.SERVERURL.'vistas/plantillas/css/materialize/css/materialize.css"/>';

}
    
?>
<style class="datamaps-style-block">

.datamap path.datamaps-graticule {
     
    fill: none; stroke: #777; stroke-width: 0.5px; stroke-opacity: .5; pointer-events: none; } 
    
    .datamap .labels {
        
        pointer-events: none;
    } 
    .datamap path:not(.datamaps-arc), 
    
    .datamap circle, .datamap line {
        stroke: #FFFFFF; vector-effect: non-scaling-stroke; stroke-width: 1px;} 
    
    .datamaps-legend dt, .datamaps-legend dd {
        
        float: left; margin: 0 3px 0 0;
    } 
    
    .datamaps-legend dd {
        width: 20px;
        
        margin-right: 6px;
        
        border-radius: 3px;
    } 
    
    .datamaps-legend {
        
        padding-bottom: 20px;
        
        z-index: 1001;
        
        position: absolute; 
        
        left: 4px; font-size: 
        
        12px; font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
    } 
    
    .datamaps-hoverover {
        
        display: none; 
        
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
     } 
    
    .hoverinfo {
        
        padding: 4px;
        
        border-radius: 1px;
        
        background-color: #FFF;
        
        box-shadow: 1px 1px 5px #CCC;
        
        font-size: 12px; border: 1px solid #CCC; 
    }
    
    .hoverinfo hr {
        border:1px dotted #CCC; 
        }
    </style>
</head>
