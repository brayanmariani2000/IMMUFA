<?php
session_start(['name'=>'Inmufa']);
?>
<?php   include_once "includ/link.php"; ?>
<body class="">
    <?php require_once "./controlador/vistasControlador.php";
        $peticionesAjax=false;
        $iv=new vistasControlador();
        $vistas=$iv->obtener_vistas_controlador();
        $listablanca1=['home','404','login',];
        if (in_array($vistas,$listablanca1) ) {
            require_once "./vistas/".$vistas."_vistas.php";
        }else{ 
            if (!isset($_SESSION['Usuario']) || empty($_SESSION['token'])) {
                header('Location: '.SERVERURL.'login');
                exit;
            }                  
            include_once "includ/menucab.php";               
            if ($_SESSION['rol']==3) {
                include_once "includ/menu_asistente.php"; 
            }elseif($_SESSION['rol']==2){
                include_once "includ/menu_administrador.php";
            }else{
                include_once "includ/menu_presidente.php";
            }
    ?>                 
        <div class="page-wrapper">
            <div class="row page-titles m-b-0">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?php echo  $_SESSION['role']?>: <?php echo  $_SESSION['Nombre']?>  <?php echo  $_SESSION['apellido']?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">IMMUFA <p id="usuario" value="<?php echo $_SESSION['Usuario']?>"></p></li>
                    </ol>
                </div>
            </div>
                <div class="container-fluid">
                    <?php   require_once "./vistas/".$vistas."_vistas.php";?>
                </div>
				
        </div>
</div>
    <?php }  include_once 'includ/scrpit.php'; ?>
    <?php 
     $listablanca2=['home','login'];
    if (in_array($vistas,$listablanca2)){

    }else{
     ?><footer class="footer"> Universidad Bolivariana de Venezuela</footer>
     <?php } ?>
    </body> 
</html>