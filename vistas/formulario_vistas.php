
<div class="row">

    <div class="col-lg-9">

        <div class="card">

        <div class="card-body">

            <h4 class="card-title">Gestion de Medicos</h4>
                                <!-- Nav tabs -->
                               
                <ul class="nav nav-tabs customtab2" role="tablist" style="border-bottom: 1px solid #1976d2;" >

                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#Datos_personales" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Registrar Medicos</span></a> </li>

                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Medicos" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Medicos</span></a> </li>
                </ul>
           
           
            <form  class=" form-bordered" id="medicoRegistro">
                            <!-- Tab panes -->

                <div class="tab-content">

                            <!-- inicio de la seccion de datos personales-->

                    <div class="tab-pane active" id="Datos_personales" role="tabpanel">

                        <div class="form-group">


                          <div class="form-row">

                                <div class="col-md-6 ">

                                    <label for="nombre" >Nombre</label>

                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">

                                 </div>

                                 <div class="col-md-6">

                                    <label for="apellido">Apellido</label>

                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">

                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="form-row">

                                <div class="col-md-6">

                                    <label for="cedula">Cedula</label>

                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula">

                                </div>

                                <div class="col-md-6">

                                    <label  for="telefono">Telefono</label> 

                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">

                                </div>

                            </div>

                        </div>


                        <div class="form-group">

                            <div class="form-row">

                                <div class="col-md-6">

                                    <label for="correo">Fecha de Nacimiento</label>

                                    <input type="date" class="form-control" name="fecha_naci" id="fecha_naci" placeholder="fecha_naci">

                                </div>

                                <div class="col-md-6">

                                    <label for="sexo_m">Genero</label>

                                    <select name="sexo_m" id="sexo_m" class="form-control" >

                                        <option value="1">FEMENINO</option>

                                        <option value="2">MASCULINO</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">

                                <label for="especialidad">Especialidad</label>

                                <select class="form-control" id="especialidadM">

                                    <?php require_once './controlador/listarControlador.php';$area=new listarControlador();$area->listar_especialidad_controlador();?>

                                </select>

                            </div>
                                                                        

                            <div class="col-md-6">

                                <label for="correo">Correo</label>

                                <input type="email" class="form-control" name="correo" id="correo" placeholder="correo">

                            </div>

                            <div class="offset-sm-3 col-md-9">

                                <button type="submit" class="btn btn-primary" id="resgistrarMedico"><i class="fa fa-check"></i> Registrar</button>

                            </div>

                        </div>

                    </form>

                </div>

                            <!-- inicio de la seccion de direccion-->

                <div class="tab-pane p-20" id="Medicos" role="tabpanel">

                    <div class="">

                        <div class="">

                            <h4 class="card-title">Medicos</h4>

                            <div class="tabla-responsive">

                                <table class="display nowrap table table-hover table-striped table-bordered dataTable">

                                    <thead>

                                        <tr role="row">

                                            <th>Nombre y Apellido</th>

                                            <th>especialidad</th>

                                            <th><center>Acciones</center> </th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php $list= new tablaControlador(); echo $list->tabla_medico_controlador();?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

                            <!-- inicio de la seccion de discapacidad-->

                <div class="tab-pane p-20" id="horarios" role="tabpanel">

                    <div class="">

                        <div class="">

                            <h4 class="">Horarios Medicos</h4>

                                <form action="" id="horariosMedicos">

                                    <div class="form-group">

                                        <div class="form-row">

                                            <div class="col-md-6"><label for="horas">Horas</label>

                                                <select name="horas" id="horas" class="form-control">

                                                    <option>7:00 am - 11:00 am </option>

                                                </select>

                                            </div>



                                    <div class="form-group col-md-6">

                                        <label for="especialista">Especialidad</label>

                                        <select name="especialista" id="especialista" class="form-control">

                                            <option>---SELECIONE UNA ESPECIALIDAD</option>

                                            <?php require_once './controlador/listarControlador.php';$area->listar_especialidad_controlador();?>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group col-md-6">

                                    <label for="especialista">Especialista</label>

                                    <select name="especialista" id="especialista" class="form-control">

                                        <option>---SELECIONE UN ESPECIALISTA</option>

                                        <?php require_once './controlador/listarControlador.php';$area->listar_medico_controlador();?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-12"><h3 class="card-titlle ">Dias</h3></div>

                                <div class="col-md-4"> 

                                    <label class="checkbox-label">

                                    <input type="checkbox" class="checkbox" />

                                    <div class="svg-icon">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">

                                            <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>

                                        </svg>

                                    </div>

                                    <span class=".container-checkbox "></span>LUNES</label>

                                </div>
                                                
                                <div class="col-md-4"> 

                                    <label class="checkbox-label">

                                    <input type="checkbox" class="checkbox" />

                                        <div class="svg-icon">

                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" >
                                                        
                                                <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                                 
                                            </svg>

                                        </div>

                                    <span class=".container-checkbox "></span>MARTES</label>

                                </div> 
 

                                <div class="col-md-4"> 

                                    <label class="checkbox-label">

                                    <input type="checkbox" class="checkbox" />

                                        <div class="svg-icon">

<svg xmlns="http://www.w3.org/2000/svg"

height="1em"
                                                        viewBox="0 0 448 512"
                                                        >
                                                        <path
                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                                        ></path>
                                                        </svg>
                                                    </div>
                                                    <span class=".container-checkbox"></span>
                                                    MIERCOLES</label>                                                    
                                                </div>
       
                                                <div class="col-md-4">
                                                    <label class="checkbox-label">
                                                    <input type="checkbox" class="checkbox" />
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
                                                    <span class=".container-checkbox"></span>
                                                    JUEVES</label>
                                                </div>

                                                <div class="col-md-4"> 
                                                        <label class="checkbox-label">
                                                        <input type="checkbox" class="checkbox" />
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
                                                    <span class=".container-checkbox"></span>
                                                    VIERNES</label>
                                                </div>  

                                                <div class="col-md-4"> 
                                                        <label class="checkbox-label">
                                                        <input type="checkbox" class="checkbox" />
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
                                                    <span class=".container-checkbox"></span>
                                                    SABADO</label>
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
                    </div>
                </div>
                
</div>