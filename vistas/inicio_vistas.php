            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Start Page Content -->
                        <div class="row ">
                            

                       <?php include_once "./controlador/listarControlador.php";
                       $card=new listarControlador();
                       echo $card->listar_especialidades_card();
                       ?> 

                <!-- /# row -->
                            
                           <!-- Dentro de la sección del row p-t-40 -->
<div class="row p-t-40">
    <div class="col-lg-8">
        <div class="p-20">
            <div class="row"> <!-- Cambié a row para mejor disposición -->
                <div class="col-md-6 mb-3"> <!-- Agregué mb-3 para margen inferior -->
                    <button class="btn btn-info btn-block" id="registarPacienteInicio" url="formularioPaciente">
                        <i class="ti-plus"></i> Registrar Paciente
                    </button>
                </div>   
                
                <div class="col-md-6">
                    <div class="input-group"> <!-- Agregué input-group para mejor integración -->
                        <input type="search" class="form-control" placeholder="Buscar paciente..." 
                               aria-controls="example23" id="buscarPaciente">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" id='buscarTabla'></div>
    </div>

    <!-- Resto de tu código... -->
                            <div class="col-lg-4 ">


                                <div class="card">

                                    <div class="col-md-12">
                                        
                                        <h4 class="card-title">Citas Por Area de Consulta o Especialidad </h4>

                                            <h5 class="m-t-30">GINECOLOGIA<span class="pull-right">1</span></h5>

                                        <div class="progress ">

                                            <div class="progress-bar bg-danger wow animated progress-animated" style="width: 15%; height:6px;" role="progressbar"></div>

                                        </div>

                                        <h5 class="m-t-30">MAMOGRAFIA<span class="pull-right">0</span></h5>

                                        <div class="progress">

                                            <div class="progress-bar bg-info wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"></div>

                                        </div>
                                        
                                        <h5 class="m-t-30">MEDICINA INTERNA<span class="pull-right">0</span></h5>
                                        
                                        <div class="progress">
                                         
                                            <div class="progress-bar bg-pink wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"></div>
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div>
                           
                            </div>


                    
                <!-- /# row -->
                


                <!-- End PAge Content -->
            </div> 

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- End footer -->

           
        </div>
