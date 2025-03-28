<?php   include_once "includ/link.php"; ?>

<body class="hoal">
                <!-- Preloader - style you can find in spinners.css -->

    <?php require_once "./controlador/vistasControlador.php";

        $peticionesAjax=false;

        $iv=new vistasControlador();

        $vistas=$iv->obtener_vistas_controlador();

        $listablanca1=['home','404','login',];

        if (in_array($vistas,$listablanca1) ) {

            require_once "./vistas/".$vistas."_vistas.php";

        }else{

                        session_start(['name'=>'Inmufa']);

                        $pagina=explode("/",$_GET['page']);

                        include_once "includ/menucab.php"; 
                        

                        if ($_SESSION['rol']==3) {

                            include_once "includ/menu_asistente.php"; 

                        }elseif($_SESSION['rol']==2){

                            include_once "includ/menu_administrador.php";

                        }else{

                            include_once "includ/menu_presidente.php";

                        }

    ?>
                   
    <!-- Preloader - style you can find in spinners.css -->
    
    <!-- Main wrapper  -->
    
            <!-- End Sidebar scroll-->
        
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
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
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
                <div class="container-fluid">
                <!-- Start Page Content -->
                    <?php   require_once "./vistas/".$vistas."_vistas.php";?>

                </div>
				
                <!-- /# row -->

                

                <!-- End PAge Content -->
        </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <!-- End footer -->
</div>
        <!-- End Page wrapper  -->
    
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <?php }  include_once 'includ/scrpit.php'; ?>
   

    <?php 
     $listablanca2=['home'];
    if (in_array($vistas,$listablanca2)){
      
    }else{

     ?><footer class="footer"> © Instituto Municipal de la Mujer y la Familia</footer>

     <?php } ?>

    </body>
</html>