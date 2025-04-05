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
