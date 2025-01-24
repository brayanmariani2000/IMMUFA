<div class="row">

    <div class="col-9">
    
        <div class="card">
     
           <div class="card-body">
            
                <h4 class="card-title">Registro de Paciente</h4>
                                <!-- Nav tabs -->
                               
                <ul class="nav nav-tabs customtab2" role="tablist" style="border-bottom: 1px solid #1976d2;" >
             
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#Datos_personales" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Datos Personale</span></a> </li>
             
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Direccion" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Direccion</span></a> </li>
              
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Discapacidad" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Discapacidad Y Etnias</span></a> </li>
              
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#AreaConsulta" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Cita</span></a> </li>
     
                </ul>
           
           

                <form  method="POST" class=" form-bordered" id="paciente_cita">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- inicio de la seccion de datos personales-->
                                    <div class="tab-pane active" id="Datos_personales" role="tabpanel">
                                   
                                         <div class="form-group">

                                    
                                            <div class="form-row">
                                            
                                                <div class="col-md-6" id="nombreVerificar">
                                            
                                                    <label for="nombre" >Nombre</label>
                                                    
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                                </div>
                                            
                                                <div class="col-md-6" id="apellidoVerficar">
                                                    
                                                    <label for="apellido">Apellido</label>
                                                    
                                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                                </div>
                                        
                                            </div>
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                        
                                            <div class="form-row">
                                            
                                                <div class="col-md-6" id="cedulaVerificar">
                                                
                                                    <label for="cedula">Cedula</label>
                                                
                                                   <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula">
                                                    <div class="invalid-feedback">
                                                    Por favor, introduce un número de 6 a 10 dígitos.
                                                    </div>
                                                    </div>
                                                 <div class="col-md-6" id="telefonoVerficar">
                                                
                                                    <label  for="telefono">Telefono</label> 
                                                    
                                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                                                </div>
                                            
                                            </div>
                                        
                                        </div>

                                        <div class="form-group">
                                             
                                            <div class="form-row">
                                            
                                                <div class="col-md-6" id="fechaNacimientoVerificar">
                                                 
                                                    <label for="correo">Fecha de Nacimiento</label>
                                                
                                                    <input type="date" class="form-control" name="fecha_naci" id="fecha_naci">
                                                </div>
                                                
                                                <div class="col-md-6">
                                                
                                                    <label for="sexo">Genero</label>
                                            
                                                    <select name="sexo" id="sexo" class="form-control" >
                                            
                                                        <option value="1">FEMENINO</option>
                                                
                                                        <option value="2">MASCULINO</option>
                                                    
                                                    </select>
                                           
                                                </div>
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                         <!-- inicio de la seccion de direccion-->
                                    <div class="tab-pane p-20" id="Direccion" role="tabpanel">
                                    
                                        <div class="form-group row">
                                         
                                            <div class="col-md-6">
                                                
                                                <label for="municipio">Municipio</label>
                                                    
                                                <select class="form-control" name="municipio" id="municipio">
                                                    
                                                    <option value="0">--- ELIGE UN MUNICIPIO ---</option> 
                                                    
                                                    <?php require_once './controlador/listarControlador.php'; $area=new listarControlador();$area->listar_municipio_controlador();?>
                                                    
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                
                                                <label for="Parroquia">Parroquia</label>
                                                
                                                <select class="form-control" name="parroquia" id="Parroquia">
                                                
                                                    <option value="0">--- ELIGE UN PARROQUIA ---</option> 
                                                
                                                </select>
                                            
                                            </div>
                                        
                                        </div>
                                        
                                    
                                    </div>
                                    <!-- inicio de la seccion de discapacidad-->
                                    <div class="tab-pane p-20" id="Discapacidad" role="tabpanel">
                                        
                                            <div class="form-group row">
                                            
                                                <div class="col-md-6 ">
                                                
                                                    <label for="discapacidades_op">POSEE ALGUNA DISCAPACIDAD</label>
                                                     
                                                        <div class="col-md-4"> 
                                                        
                                                            <label class="checkbox-label">
                                                        
                                                            <input type="checkbox" class="checkbox" id="discapacidad_si"/>
                                                        
                                                                <div class="svg-icon">
                                                            
                                                                    <svg
                                                           
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                        
                                                                     height="1em"
                                                            
                                                                     viewBox="0 0 448 512"
                                                                    >
                                                                    
                                                                    <path
                                                                     d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                                                    ></path>
                                                                    
                                                                    </svg>
                                                        
                                                                </div>
                                                        
                                                                <span class=".container-checkbox "></span>
                                                                
                                                                    SI</label>
                                                            
                                                        </div>
                                                 
                                                        <div class="col-md-4"> 
                                                      
                                                          <label class="checkbox-label">
                                                            
                                                          <input type="checkbox" class="checkbox" id="discapacidad_no" />
                                                        
                                                              <div class="svg-icon">
                                                            
                                                              <svg
                                                                
                                                              xmlns="http://www.w3.org/2000/svg"
                                                                
                                                              height="1em"
                                                                
                                                              viewBox="0 0 448 512"
                                                            
                                                              >
                                                            
                                                              <path
                                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                                            
                                                                ></path>
                                                            
                                                            </svg>
                                                        
                                                        </div>
                                                        
                                                        <span class=".container-checkbox "></span>
                                                        
                                                        NO</label>
                                                 
                                                    </div>
                                                
                                                </div>

                                                <div class="col-md-6 hiden" id="discapacidad_opcion">
                                                  
                                                    <label for="discapacidad">DISCAPACIDADES</label>
                                                    
                                                    <select name="discapacidad" id="discapacidad" class="form-control">
                                                    
                                                        <option value="0">---SELECIONE UNA OPCION---</option>
                                                        
                                                        <?php  $area->listar_discapacidad_controlador(); ?>
                                                            
                                                    </select>
                                                     
                                                </div>
                                                  
                                            </div>
                                             
                                                <div class="form-group row">
                                                 
                                                    <div class="col-md-6">
                                                    
                                                        <label for="etnia">PERTENECE A UNA ETNIA</label>
                                                        
                                                        <div class="col-md-4"> 
                                                       
                                                        <label class="checkbox-label">
                                                        
                                                        <input type="checkbox" class="checkbox" id="etnia_si" />
                                                        
                                                        <div class="svg-icon">
                                                        
                                                        <svg
                                                        
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        
                                                        height="1em"
                                                        
                                                        viewBox="0 0 448 512"
                                                        
                                                        >
                                                        
                                                        <path
                                                        
                                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                                        
                                                        ></path>
                                                        
                                                        </svg>
                                                        
                                                    </div>
                                                       
                                                    <span class=".container-checkbox "></span>
                                                    
                                                        
                                                    SI</label>
                                                 
                                                </div>
                                                
                                                <div class="col-md-4"> 
                                                     
                                                    <label class="checkbox-label">
                                                    
                                                    <input type="checkbox" class="checkbox" id="etnia_no"/>
                                                        
                                                        <div class="svg-icon">
                                                         
                                                        <svg
                                                        
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        
                                                        height="1em"
                                                        
                                                        viewBox="0 0 448 512"
                                                        
                                                        >
                                                        
                                                        <path
                                                        
                                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                                        
                                                        ></path>
                                                        
                                                        </svg>
                                                        
                                                </div>
                                                
                                                <span class=".container-checkbox "></span>
                                                
                                                NO</label>
                                                
                                            </div>
                                             
                                        </div>
                                        
                                        <div class="col-md-6 hiden" id="etnia_opcion">
                                        
                                            <label for="etnias">ETNIAS</label>
                                            
                                            <select name="etnias" id="etnias" class="form-control">
                                            
                                                <option value="0">---SELECIONE UNA OPCION---</option>
                                                
                                                <?php   $area->listar_etnias_controlador(); ?>
                                                            
                                            </select>
                                                        
                                        </div>
                                          
                                    </div>
                                    
                                </div>

                                 
                                <div class="tab-pane p-20" id="AreaConsulta" role="tabpanel">
                                
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
                                 
                                    <input type="text" name="usuario" id="usuarioRegistro" value="<?php  echo $_SESSION['Usuario']?>" class="hiden"> 
                                    
                                </div>
                
                                
                            </div>                                                  
                            
                        </div>
                        
                        <div class="offset-sm-3 col-md-9">
                        
                            <button type="submit" class="btn btn-primary" id="botonP"><i class="fa fa-check"></i> Registrar</button>
                            
                        </div>

                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>
</div>