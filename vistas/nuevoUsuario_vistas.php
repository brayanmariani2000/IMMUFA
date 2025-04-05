 
 <div class="row">
 
        <div class="col-lg-10">
        
            <div class="card card-outline-primary ">
            
                <div class="card-header m-b-10"><h4 class="m-b-0 text-white">Gestion de Usuarios</h4></div>
                
                    <div class="card-body">
                    
                          <ul class="nav nav-tabs" role="tablist">
                          
                              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#nuevoUsuario" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Nuevo usuario</span></a> </li>
                              
                              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Usuariosver" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Usuarios</span></a> </li>
                          
                          </ul>
                        
                          
                    <div class="tab-content">
                    
                      <div class="tab-pane active m-b-10" id="nuevoUsuario" role="tabpanel">

                        <div class="col-12">
                    
                          <div class="m-t-10">
                    
                            <div class="card-header">
                    
                              <h4 class="m-b-0 text-white">Nuevo usuario</h4>
                    
                             </div>
                  
                            <div class="card-body m-t-10">
        
                          <form id="registrarUsuario" method="POST" class="form-bordered">
                            
                            <div class="form-group">
                            
                              <div class="form-row">
                            
                                <div class="col-md-6">

                                  <label for="nombreUsuario">Nombre</label>
                            
                                  <input class="form-control" id="nombreUsuario" type="text"placeholder="Nombre">
                            
                                </div>
      
                                <div class="col-md-6">
      
                                  <label for="exampleInputLastName">Apellido</label>
                                  
                                  <input class="form-control" id="apellidoUsuario" type="text"  placeholder="apellido">
                                  
                                </div>
    
                              </div>
                              
                            </div>

                            <div class="form-group">

                              <div class="form-row">

                                <div class="col-md-6">

                                  <label for="cedula">Cedula</label>

                                  <input class="form-control" id="cedulaUsuario" type="text"  placeholder="cedula">

                                  </div>

                                  <div class="col-md-6">

                                  <label for="telefonno">Telefono</label>

                                  <input class="form-control" id="telefonoUsuario" type="text"  placeholder="telefono">

                                 </div>

                              </div>

                            </div>

                            <div class="form-group">

                              <div class="form-row">

                                <div class="col-md-6">

                                  <label for="sexo">SEXO</label>

                                  <select name="sexo" id="sexo" class="form-control">

                                    <option value="1">FEMENINO</option>

                                    <option value="2">MASCULINO</option>

                                   </select>

                                 </div>

                                 <div class="col-md-6">

                                   <label for="fecha_nacimineto">Fecha de Nacimiento</label>

                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">

                                 </div>

                              </div>

                            </div>

                            <div class="form-group">

                              <div class="form-row">

                                <div class="col-md-6">

                                  <label for="usuario">Nombre De Usuario</label>

                                  <input class="form-control" id="idUsuario" type="text" placeholder="Nombre de Usuario">

                                 </div>

                                 <div class="col-md-6">

                                    <label for="clave">Contraseña</label>

                                    <input class="form-control" id="clave" type="text" placeholder="Contraseña">

                                </div>

                              </div>

                            </div>

                            <div class="form-group row">

                              <div class="col-md-6">

                                <label for="rol">Privilegios</label>

                                <select name="rol_usu" id="rol" class="form-control">

                                <?php  require_once 'controlador/listarControlador.php';  $lista= new listarControlador(); echo $lista->listar_roles(); ?>

                                </select>

                              </div>

                            </div>



                            <div class="row">

                             <div class="offset-sm-3 col-md-9">

                                <button type="submit" class="btn btn-primary" id="registrarUsuariobt"> <i class="fa fa-check"></i> Registrar</button>

                              </div>

                            </div>
                                                                        

                         </form>

                              </div>

                            </div>

                          </div>

                        </div>

                 
                      <div class="tab-pane p-20" id="Usuariosver" role="tabpanel">

                      <div class="col-md-12">

                        <div class="card-body">

                            <h4 class="card-title">Usuarios</h4>

                            <div class="tabla-responsive">

                              <table class="display nowrap table table-hover table-striped table-bordered dataTable">

                                  <thead>

                                    <tr role="row">

                                      <th>Nombre y Apellido</th>

                                      <th>Usuario</th>

                                      <th>Permisos</th>

                                      <th><center>Acciones</center> </th>

                                    </tr>

                                  </thead>

                                  <tbody>


                                    <?php  require_once 'controlador/listarControlador.php';  $list= new tablaControlador(); echo $list->tabla_usuario_controlador(); ?>
                                                  
                                  </tbody>
                                                
                               </table>
                                            
                            </div>
                                        
                          </div>
                                        
                        </div>

                      </div>
                                    
                   </div>
                    
                 </div>
                                  
               </div>
                                
             </div>

          </div>
