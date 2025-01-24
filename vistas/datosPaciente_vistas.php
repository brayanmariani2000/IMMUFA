 
 <div class="row">
 
 <div class="col-10">
 
     <div class="card ">
     
        <div class="card-header m-b-10  bg-success"><h4 class="m-b-0 ">DATOS DEL PACIENTE</h4></div>
                 

                <div class="col-12">
           
                    <div class="card-body m-t-10">
                     
                    <?php
                    
                    if(isset($_POST['verHistoria'])){
                            
                            require_once "controlador/pacienteControlador.php";
                                   
                            $actualizar=new pacienteControlador();
                    
                            echo $actualizar->datosPacienteActualizar($_POST['verHistoria']);
                    
                    
                    }
                    
                    ?>
                      
                      <div class="card-header m-b-10 bg-success" ><h5 class="m-b-0 ">CITAS</h5></div>
                        
                           
                           <?php
                           if(isset($_POST['verHistoria'])){

                            require_once "controlador/pacienteControlador.php";
                            
                            $actualizar=new pacienteControlador();

                           echo $actualizar->datosCitaActualizar($_POST['verHistoria']);
                           
                        }
                           ?>                                      
                        
                    </div>

                </div>

         </div>

    </div>
                             
</div>
             
</div>
                           
