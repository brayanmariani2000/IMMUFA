<?php
if ($peticionesAjax) {
  require_once "../modelos/loginModelo.php";
}else {
  require_once "./modelos/loginModelo.php";
}

class loginControlador extends loginModelo{
    /*---------controlador de inicio de sesion---------*/ 
  public function iniciar_sesion_controlador($usuario,$clave){
    $jeison=array();

    $chec_correo=new loginModelo();

    $chec_correo=$chec_correo->iniciar_sesion_modelo($usuario);

    if ($chec_correo->rowCount()>0) {

    $row=$chec_correo->fetch();

      if($row['clave']==$clave){
      
         session_start(['name'=>'Inmufa']);

      $_SESSION['Usuario']=$row['id_usuario'];

      $_SESSION['Nombre']=$row['nombre'];

      $_SESSION['apellido']=$row['apellido'];

      $_SESSION['rol']=$row['rol'];

      $_SESSION['role']=$row['roles'];

      $_SESSION['estado']=$row['status'];

      $_SESSION['token']=md5(uniqid( mt_rand(), true));

      $seccion=3;

      $jeison[]=array( 
     
        'seccion'=>$seccion,

         'rol'=> $_SESSION['rol']

      );
      $jason=json_encode($jeison);

      echo $jason;

    }
    else{
      $seccion=2;
      
      $jeison[]=array( 
     
        'seccion'=>$seccion

      );
      $jason=json_encode($jeison);

      echo $jason;
    }   

  }else{
        $seccion=1;

        $jeison[]=array( 
     
          'seccion'=>$seccion
        );
        $jason=json_encode($jeison);

        echo $jason;
  }
 
}


     public function listar_cita(){
      $brayan=0;
      $cont=0;
      $numeroRegistro=2;
      $posicion=2;
      if($posicion==0){
        $posicion=0;
      }
      $contador=0;
      $list=conexionModelo::ejecutar_consulta_simple("SELECT * FROM persona INNER JOIN cita, discapacidad,parroquia,municipios,estados,etnia,consulta,especialidad WHERE
      cita.persona_id=persona.id_persona
      AND persona.id_discapacidad=discapacidad.id_discapacidad
      AND persona.id_parroquia=parroquia.id_parroquia
      AND parroquia.id_municipios=municipios.id_municipio
      AND municipios.id_estado=estados.id_estado
      AND persona.id_etnia=etnia.id_etnia
      AND consulta.id_consulta=cita.id_consulta
      AND especialidad.id_especialidad=consulta.id_especialidad
      GROUP BY cita.persona_id");
      $datos=$list->fetchAll();
   /*   $list=conexionModelo::ejecutar_consulta_simple("SELECT * FROM `paciente`");
      $list=$list->fetchAll();
      foreach($list as $key){
        if($key['cedula_p']>0){
          $cont++;
        }
      }
      */
      $botones=ceil($cont/$numeroRegistro);
      foreach($datos as $row){
       
          # code...
      
        $contador++;
       ?>
    
    <tr>
    
    <td><?php echo $contador?></td>
              
        <td><?php echo $row['nombre'].' '. $row['apellido']?> </td>
        
        <td><?php echo $row['cedula']?></td>
        
        <td><?php echo $row['municipio'].', '.$row['parroquias']?></td>
        
        <td><?php echo  $row['discapacidades']?></td>
        
        <td><?php echo $row['etnias']?> </td>

        <td><?php  echo $row['fecha_nacimiento'] ?></td>
        
        <td style="width: 131.8px;"><div style=" display:flex;">
        
        <form action="<?php echo SERVERURL."nuevaCita" ?>" method="POST"><button type="submit" class="btn btn-success"     name="Nueva_Cita"  value="<?php echo $row['id_persona']?>" style="margin:5px;">Nueva Cita</button></form> 
        
       <form action="<?php echo SERVERURL."datosPaciente" ?>" method="POST"><button type="submit" class="btn btn-info"   name="verHistoria"  value="<?php echo $row['id_persona']?>" style="margin:5px;">Ver Historial</button></form> 
        
      </div>
      
    </td>
    
    </tr>
    
    <?php
      
      }

     }
     public function tabla_area(){
     
      $list=conexionModelo::ejecutar_consulta_simple("SELECT * FROM `especialidad` ");
      $datos=$list->fetchAll();
      foreach($datos as $row){
        ?><tr>
        <td><?php echo $row['id_especialidad'] ?></td>

        <td><?php echo $row['especialidad'] ?></td>

        <td>
          <div style=" display: flex;">

            <div style="margin:4px ;">

            <?php if($row['status']==1){?>
              
            <button type="submit" class="btn btn-danger btn " id="eliminarArea" value="<?php echo $row['id_especialidad'] ?>"><i class="ti-close"></i>Desabilitar</button>
              
            <?php  } else { ?>

              
            <button type="submit" class="btn btn-success btn " id="habilitarArea" value="<?php echo $row['id_especialidad'] ?>">Habilitar</button>
              
            <?php } ?>


            </div>
         
            </div>

            </td>
    </tr>

    <?php
    }
     
  }


     public function listar_dependencia(){
     
      $list=conexionModelo::ejecutar_consulta_simple("SELECT * FROM `dependencias` ");
     
      $datos=$list->fetchAll();
     
      foreach($datos as $row){
        ?><tr>
        <td><?php echo $row['id_dependencia'] ?></td>

        <td><?php echo $row['dependencia'] ?></td>

            <td>
              <div style=" display: flex;">

              <div style="margin:4px ;">
               
              <?php if($row['status']==1){?>
               
              
              <button type="submit" class="btn btn-danger btn " id="eliminarDependencia" value="<?php echo $row['id_dependencia'] ?>"><i class="ti-close"></i>Desabilitar</button>
               
              
              <?php  } else { ?>

              <button type="submit" class="btn btn-success btn " id="habilitarDependencia" value="<?php echo $row['id_dependencia'] ?>">Habilitar</button>
              
              <?php } ?>

               </div>

             </div>

            </td>

    </tr>
    <?php  
    }
     }
    

/*---------contolador cerrar sesion------*/
     public function cerrar_sesion_controlador(){
      session_start(['name'=>'Inmufa']);
      session_unset();
      session_destroy();
      header("location: ".SERVERURL."login");
      exit();
}
}

