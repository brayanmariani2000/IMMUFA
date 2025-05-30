<?php require_once 'controlador/listarControlador.php'; $area=new listarControlador()?>
 
<div class="row">
 
 <div class="col-10">
 
     <div class="card ">
     
        <div class="card-header m-b-10"><h4 class="m-b-0 ">DATOS DEL PACIENTE</h4></div>
                 

                <div class="col-12">
           
                    <div class="card-body m-t-10">
                    <form  method="POST" class=" form-bordered" id="paciente_cita_nueva">

                            <div class="card mb-4 border-primary">
                                <div class="card-header bg-primary text-white py-2">
                                    <h5 class="mb-0">
                                        <i class="fas fa-user-tag mr-2"></i>INFORMACIÓN PERSONAL
                                    </h5>
                                </div>
                             <div class="card-body">
                            <div class="row">

              
                        
                                            <?php
                                        
                                            if(isset($_POST['Nueva_Cita'])){
                                                
                                                require_once "controlador/pacienteControlador.php";
                                                    
                                                $actualizar=new pacienteControlador();
                                        
                                                echo $actualizar->datosPacienteActualizar($_POST['Nueva_Cita']);
                                        
                                        
                                            }
                                        
                                            ?> 
                                    </div>
                                </div>
                            </div>
                       

                      
                      <div class="card-header m-b-10"><h5 class="m-b-0 ">NUEVA CITA</h5></div>
                        
                           
                                                      
                      <div class="form-group row">
                                
                                <div class="col-md-6">
                                
                                    <label for="discapacidad">Area a Consultar</label>
                                    
                                    <select name="area_consultar" id="area_consultar" class="form-control">
                                    
                                        <option value="0">---SELECIONE UNA OPCION---</option>
                                    
                                        <?php $area->listar_especialidad_controlador();?>
                                        
                                    </select>
                                    
                                </div>
                                
                                <div class="col-md-6">
                                
                                    <label for="dependencia">Referencia</label>
                                    
                                    <select name="dependencia" id="dependencia" class="form-control">
                                    
                                        <option value="0">---SELECIONE UNA OPCION---</option>
                                        
                                        <?php  $area->listar_dependencias_controlador();?>

                                    </select>
                                                   
                                </div>
                                
                            </div>
                             
                            <div class="form-group row">
                            
                                <div class="col-md-6">
                                
                                    <label for="especialista">Especialista</label>
                                    
                                    <select name="especialista" id="especialista" class="form-control">
                                        
                                         <option value="0">---SELECIONE UNA OPCION---</option>
                                                             
                                    </select>
                                                    
                                </div>
                                
                                <div class="col-md-6" id="fechaConsultaVerificar">
                                
                                    <label for="fecha_cita">Fecha de la Cita</label>
                                    
                                    <input type="date" name="fecha_consulta" id="fecha_consulta" class="form-control">
                                    
                                </div>
                                
                            </div>
                            
                            <div class="form-group row">
                             
                                <input type="text" name="usuario" id="usuarioRegistro" value="<?php  echo $_SESSION['Usuario']?>" class="d-none"> 
                                <input type="text" name="paciente" id="idPaciente" value="<?php  echo $_POST['Nueva_Cita']?>" class="d-none">  

                                
                                
                            </div>

                            <div class="offset-sm-3 col-md-9">
                        
                               <button type="submit" class="btn btn-primary" id="paciente_cita"><i class="fa fa-check"></i> Registrar</button>
                        
                            </div>

                      </div>                                   
                    
                    </form> 
                    
                </div>

                </div>

         </div>

    </div>
                             
</div>
             
</div>
                         