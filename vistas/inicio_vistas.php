            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Start Page Content -->
                        <div class="row ">
                            
                            <div class="col-md-3">
                                
                                <a  href="<?php echo SERVERURL?>tablaDiscapacidad">
                                
                                <div class="card bg-primary p-20">
                                    
                                    <div class="media widget-ten">
                                        
                                        <div class="media-left meida media-middle">
                                            
                                            <span><i class="ti-location-pin f-s-40"></i></span>
                                            
                                        </div>
                                        
                                        <div class="media-body media-text-right">
                                            
                                            <h2 class="color-white"> 
                                                
                                                <?php require_once "controlador/pacienteControlador.php";
                                                
                                                $contador=new pacienteControlador();
                                                
                                                echo $contador->contar_discapcidad_controlador();?>
                                                
                                            </h2>
                                            
                                            <p class="m-b-0">CITAS PERDIDAS</p>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </a>
                                
                            </div>

                    <div class="col-md-3">

                        <a href="<?php echo SERVERURL?>tablaCita">

                            <div class="card bg-info p-20">

                                <div class="media widget-ten">

                                    <div class="media-left meida media-middle">

                                        <span><i class="ti-location-pin f-s-40"></i></span>

                                    </div>

                                    <div class="media-body media-text-right">

                                        <h2 class="color-white"><?php require_once "controlador/citaControlador.php";

                                        $contar=new citaControlador();

                                        echo $contar->contar_cita_atendidas_controlador(); ?></h2>

                                        <p class="m-b-0">CITAS ATENDIDAS</p>

                                    </div>

                                </div>

                            </div>
                        
                        </a>

                    </div>


                    <div class="col-md-3">

                        <a href="<?php echo SERVERURL?>tablaCita">

                            <div class="card bg-success p-20">

                                <div class="media widget-ten">

                                    <div class="media-left meida media-middle">

                                        <span><i class="ti-location-pin f-s-40"></i></span>

                                    </div>

                                    <div class="media-body media-text-right">

                                        <h2 class="color-white"><?php

                                        echo $contar->contar_cita_espera_controlador(); ?></h2>

                                        <p class="m-b-0">CITAS EN ESPERA</p>

                                    </div>

                                </div>

                            </div>
                    
                         </a>

                    </div>


                    <div class="col-md-3">

                   <a href="<?php echo SERVERURL?>tabla">

                        <div class="card bg-danger p-20">

                            <div class="media widget-ten">

                                <div class="media-left meida media-middle">

                                    <span><i class="ti-location-pin f-s-40"></i></span>

                                </div>

                                <div class="media-body media-text-right">

                                    <h2 class="color-white">

                                        <?php echo $contador->contar_paciente();?>

                                    </h2>

                                    <p class="m-b-0">TOTAL DE PACIENTES</p>
                                    
                                </div>

                            </div>

                        </div>

                    </div>
                </a>
                </div>
                <!-- /# row -->
                            <div class="row p-t-40 ">
                            
                            <div class="col-lg-8">
                                
                                
                                <div class="card p-20">
                                    
                                        <div class="media widget-ten">
                                            
                                            <div class="col-md-4 widget-ten p-30">
                                            
                                                <button class="btn btn-info" id="registarPacienteInicio" url="formularioPaciente">Registrar Paciente</button>
                                            
                                            </div>   
                                            
                                            <div id="example23_filter" class="dataTables_filter col-md-6 widget-ten m-l-50 p-t-30">

                                                    <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23" id="buscarPaciente"></label>

                                            </div>

                                        </div>
                                    
                                </div>
                                <div class="row card" id='buscarTabla'>

                                </div>
                                
                            </div>

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
