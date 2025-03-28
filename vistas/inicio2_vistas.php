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
                                            
                                            <span><i class="ti-bag f-s-40"></i></span>
                                            
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

                            <div class="card bg-pink p-20">

                                <div class="media widget-ten">

                                    <div class="media-left meida media-middle">

                                        <span><i class="ti-comment f-s-40"></i></span>

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

                                        <span><i class="ti-vector f-s-40"></i></span>

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
                                
                                
                                <div class="card p-20 col-md-12">
                                    
                                    <div class="media widget-ten">
                                    
                                        <div class="col-md-4 widget-ten p-30">
                                        
                                            <button class="btn btn-info" id="registarPacienteInicio" url="formularioPaciente">Registrar Paciente</button>
                                        
                                        </div>   
                                        
                                        <div id="example23_filter" class="dataTables_filter col-md-6 widget-ten m-l-50 p-t-30">

                                                <label>Buscar:<input type="Buscar" class="" placeholder="" aria-controls="example23" id="buscarPaciente"></label>

                                        </div>

                                    </div>
                                    
                                </div>
                                
                                <div class="row" id='buscarTabla'>

                                </div>
                                
                            </div>

                            <div class="col-lg-4 ">


                            <div class="card">

                                <div class="col-md-12">
                                    
                                    <h4 class="card-title">Citas Por Area de Consulta o Especialidad </h4>

                                    <div id="especialidadCitaJs">
                                       
                                        <h5 class="m-t-30">GINECOLOGIA<span class="pull-right">1</span></h5>

                                        <div class="progress ">

                                            <div class="progress-bar bg-danger wow animated progress-animated" style="width: 15%; height:6px;" role="progressbar"></div>

                                        </div>
                                    
                                    </div>

                                </div>

                                </div>
                           
                            </div>

                        </div>
                    
                <!-- /# row -->

                </div>
                <div class="row card">
                    <div class="col-lg-10">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Rango de edades</h4>
                                    </div>
                                </div>
                                <div class="panel-body" id="">
                                    <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                    <canvas id="barrasChart" width="500" height="192" style="display: block; height: 234px; width: 469px;"></canvas>
                                </div>
                            </div>
                     </div>
                </div>

                <div class="row col-lg-12">
                    
                    <div class="col-md-5 card">
                    
                        <div class="panel">
                        
                            <div class="panel-heading">
                            
                                <div class="panel-title">
                                
                                    <h4>Direccion por pacientes</h4>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="panel-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            
                                <canvas id="pieChart" height="312" style="display: block; height: 250px; width: 250px;" width="312"></canvas>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-6 card">
                    
                        <div class="card-title">
                        
                            <h4>Sexo</h4>
                            
                        </div>
                        
                        <div class="card-content">
                        
                            <div id="basic-Pie" style="height: 370px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1732967643793">
                            
                                <div style="position: relative; overflow: hidden; width: 771px; height: 370px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;">
                                
                                    <canvas width="963" height="462" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 771px; height: 370px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                            
                                </div>
                            
                                <div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1), top 0.4s cubic-bezier(0.23, 1, 0.32, 1); background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 464px; top: 162px;">Source <br>Direct : 335 (13.08%)
                         
                               </div>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                    
                </div>
                <div class="row">
                <div class="col-lg-12 ">

                            <div class="card">

                                <div class="col-md-12">
                                    
                                    <h4 class="card-title">Total de Citas Por Dependencias </h4>

                                        <h5 class="m-t-30">GOBERNACION<span class="pull-right">1</span></h5>

                                    <div class="progress ">

                                        <div class="progress-bar bg-danger wow animated progress-animated" style="width: 15%; height:6px;" role="progressbar"></div>

                                    </div>

                                    <h5 class="m-t-30">PSUV<span class="pull-right">0</span></h5>

                                    <div class="progress">

                                        <div class="progress-bar bg-info wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"></div>

                                    </div>
                                    
                                    <h5 class="m-t-30">COMUNIDAD<span class="pull-right">0</span></h5>
                                    
                                    <div class="progress">
                                    
                                        <div class="progress-bar bg-face wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"></div>
                                    
                                    </div>

                                    <h5 class="m-t-30">ALIANZAS<span class="pull-right">0</span></h5>
                                    
                                    <div class="progress">
                                    
                                        <div class="progress-bar bg-youtube wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"></div>
                                    
                                    </div>
                                    <h5 class="m-t-30">SATIUSUM<span class="pull-right">0</span></h5>
                                    
                                    <div class="progress">
                                    
                                        <div class="progress-bar bg-pink wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"></div>
                                    
                                    </div>
                                
                                </div>

                            </div>

                            </div>
                </div>
                <!-- End PAge Content -->
            </div> 
           
        </div>
