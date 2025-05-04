<?php
require_once "conexionModelo.php";

class pacienteModelo extends conexionModelo{
  /* REGISTRAR LOS DATOS DEL PACIENTE PARA EL MODAL*/ 

  protected static function agregar_paciente_modelo($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$direccion,$etnia,$discapacidad){

      $sql=conexionModelo::conectar()->prepare("INSERT INTO persona(nombre,apellido,cedula,fecha_nacimiento,telefono,sexo,id_parroquia,id_etnia,id_discapacidad) VALUES ('$nombre','$apellido','$cedula','$fecha_naci','$telefono','$sexo','$direccion','$etnia','$discapacidad')");

      $sql->execute();

      return $sql;

      }

              /** modelo para eliminar  */
      protected static function eliminar_modelo($cedula_p){

      $sql=conexionModelo::conectar()->prepare("DELETE FROM paciente WHERE cedula_p='$cedula_p'");

      $sql->execute();

    return $sql;

    }

              /* AGREGAR LA CITA AL PACIENTE*/ 
    protected static function agregar_paciente_cita($id,$fecha_cita,$condicion,$dependencia,$id_usuario,$id_consulta){

      $sql=conexionModelo::conectar()->prepare("INSERT INTO cita(persona_id,fecha_registro,condicion_id,id_usuario,dependencia_id,id_consulta) 

      VALUES ('$id','$fecha_cita','$condicion','$id_usuario','$dependencia','$id_consulta')");

      $sql->execute();

      return $sql;

  }
          /* CONTAR  PACIENTE*/ 
  protected static function contador_paciente(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM cita ");

    $sql->execute();

    return $sql;
  }

              /* CONTAR  DISCAPACITADOS*/ 
  protected static function contar_discapcitados(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM cita INNER JOIN persona WHERE persona_id=id_persona");

    $sql->execute();

    return $sql;

  }

                 /* MOSTRAR LOS DATOS DEL PACIENTE PARA EL MODAL*/ 
  protected static function mostrar_paciente_modelo($idPersona){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM persona INNER JOIN discapacidad,municipios,parroquia,etnia

    WHERE '$idPersona'=persona.id_persona

    AND persona.id_discapacidad=discapacidad.id_discapacidad

    AND persona.id_parroquia=parroquia.id_parroquia

    AND parroquia.id_municipios=municipios.id_municipio

    AND etnia.id_etnia=persona.id_etnia");

    $sql->execute();

    return $sql;
  }

  /* ACTUALIZAR LOS DATOS DEL PACIENTE PARA EL MODAL*/ 
  protected static function actualizar_paciente($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$etnia,$discapacidad,$idParroquia,$idPersona){

  $sql=conexionModelo::conectar()->prepare("UPDATE `persona` SET `nombre`='$nombre',

  `apellido`='$apellido',

  `telefono`='$telefono',

  `id_discapacidad`='$discapacidad_p',

  `id_parroquia`='$idParroquia',

  `id_etnia`='$etnia',

  `fecha_nacimiento`='$fecha_naci',

  `sexo`='$sexo',

  WHERE id_persona='$idPersona'");

  $sql->execute();

  return $sql;
  }

  protected static function validacion($cedula){

    $sql=conexionModelo::conectar()->prepare("SELECT id_persona,cedula FROM persona WHERE cedula='$cedula'");
    
    $sql->execute();
    
    return $sql;
  }


  protected static function registrar_consulta_modelo($especialidad,$especialista,$fecha_consulta,$hora_consulta){

    $sql=conexionModelo::conectar()->prepare("INSERT INTO consulta(id_especialidad,id_medico,fecha_consulta,hora_consulta,estado_consulta)

    VALUES('$especialidad','$especialista','$fecha_consulta','$hora_consulta','1')");
      
    $sql->execute();

    return $sql;
  }

  
  protected static function validacion_consulta($especialidad,$especialista,$fecha_consulta,$hora_consulta,$estado_consulta){

    $sql=conexionModelo::conectar()->prepare("SELECT id_consulta FROM consulta 

    WHERE id_especialidad='$especialidad'

    AND id_medico='$especialista'

    AND fecha_consulta='$fecha_consulta'

    AND hora_consulta='$hora_consulta'

    AND estado_consulta='$estado_consulta'");

    $sql->execute();

    return $sql;

  }

  protected static function buscar_Paciente_Modelo($buscar){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM persona WHERE cedula LIKE'$buscar%' 
    LIMIT 5");

    $sql->execute();
    
    return $sql;

  }

  protected static function mostrar_citas_modelo($idPersona){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM cita INNER JOIN consulta,dependencias,condicion,medico,especialidad,persona

    WHERE '$idPersona'=cita.persona_id
    
    AND cita.dependencia_id=dependencias.id_dependencia

    AND cita.condicion_id=condicion.id_condicion

    AND cita.id_consulta=consulta.id_consulta

    AND consulta.id_especialidad=especialidad.id_especialidad

    AND consulta.id_medico=medico.id_medico

    AND medico.id_persona=persona.id_persona
    
     ");

    $sql->execute();

    return $sql;

  }

  protected static function buscar_historial_citas_modelo($buscar) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                p.nombre AS Nombre_Paciente,
                p.apellido AS Apellido_Paciente,
                p.cedula AS Cedula_Paciente,
                e.especialidad AS Especialidad,
                m.nombre AS Nombre_Medico,
                m.apellido AS Apellido_Medico,
                c.fecha_consulta AS Fecha_Atencion,
                c.hora_consulta AS Hora_Atencion,
                ci.fecha_registro AS Fecha_Registro,
                up.nombre AS Nombre_Registrador,
                up.apellido AS Apellido_Registrador
            FROM 
                cita ci
            JOIN 
                persona p ON ci.persona_id = p.id_persona
            JOIN 
                consulta c ON ci.id_consulta = c.id_consulta
            JOIN 
                especialidad e ON c.id_especialidad = e.id_especialidad
            JOIN 
                medico me ON c.id_medico = me.id_medico
            JOIN 
                persona m ON me.id_persona = m.id_persona
            JOIN 
                usuario u ON ci.id_usuario = u.id_usuario
            JOIN 
                persona up ON u.persona_id = up.id_persona
            WHERE 
                p.cedula LIKE :buscar
            ORDER BY 
                ci.fecha_registro DESC
            LIMIT 100");

    $buscarParam = "$buscar%";
    
    $sql->bindParam(':buscar', $buscarParam, PDO::PARAM_STR);
    
    $sql->execute();
    
    return $sql;
}
}
