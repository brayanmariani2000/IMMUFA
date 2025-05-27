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
                 protected static function mostrar_paciente_modelo($idPersona) {
                  $conexion = conexionModelo::conectar();
                  $sql = $conexion->prepare("SELECT 
                      p.id_persona,
                      p.nombre,
                      p.apellido,
                      p.cedula,
                      p.telefono,
                      p.correo,
                      p.id_parroquia,
                      p.sexo,
                      pa.parroquias,
                      m.municipio,
                      m.id_municipio,
                      e.estados AS estado,
                      et.etnias,
                      d.discapacidades,
                      p.fecha_nacimiento,
                      p.nacionalidad,
                      (SELECT COUNT(*) FROM cita WHERE persona_id = p.id_persona) AS veces_atendido,
                      GROUP_CONCAT(DISTINCT esp.especialidad SEPARATOR ', ') AS especialidades_atendidas,
                      MAX(c.fecha_registro) AS ultima_atencion
                  FROM 
                      persona p
                  LEFT JOIN 
                      parroquia pa ON p.id_parroquia = pa.id_parroquia
                  LEFT JOIN 
                      municipios m ON pa.id_municipios = m.id_municipio
                  LEFT JOIN 
                      estados e ON m.id_estado = e.id_estado
                  LEFT JOIN 
                      etnia et ON p.id_etnia = et.id_etnia
                  LEFT JOIN 
                      discapacidad d ON p.id_discapacidad = d.id_discapacidad
                  LEFT JOIN 
                      cita c ON p.id_persona = c.persona_id
                  LEFT JOIN 
                      consulta con ON c.id_consulta = con.id_consulta
                  LEFT JOIN 
                      especialidad esp ON con.id_especialidad = esp.id_especialidad
                  WHERE 
                      p.id_persona = :id_persona
                  GROUP BY 
                      p.id_persona");
                  
                  $sql->bindParam(":id_persona", $idPersona, PDO::PARAM_INT);
                  $sql->execute();
                  
                  return $sql;
              }

  /* ACTUALIZAR LOS DATOS DEL PACIENTE PARA EL MODAL*/ 
  protected static function actualizar_paciente($nombre, $apellido, $cedula, $fecha_naci, $telefono, $sexo, $etnia, $discapacidad, $idParroquia, $idPersona) {
    $sql = conexionModelo::conectar()->prepare("UPDATE `persona` SET 
        `nombre` = :nombre,
        `apellido` = :apellido,
        `cedula` = :cedula,
        `telefono` = :telefono,
        `id_discapacidad` = :discapacidad,
        `id_parroquia` = :idParroquia,
        `id_etnia` = :etnia,
        `fecha_nacimiento` = :fecha_naci,
        `sexo` = :sexo
        WHERE id_persona = :idPersona");
    
    $sql->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $sql->bindParam(":apellido", $apellido, PDO::PARAM_STR);
    $sql->bindParam(":cedula", $cedula, PDO::PARAM_INT);
    $sql->bindParam(":telefono", $telefono, PDO::PARAM_STR);
    $sql->bindParam(":discapacidad", $discapacidad, PDO::PARAM_INT);
    $sql->bindParam(":idParroquia", $idParroquia, PDO::PARAM_INT);
    $sql->bindParam(":etnia", $etnia, PDO::PARAM_INT);
    $sql->bindParam(":fecha_naci", $fecha_naci, PDO::PARAM_STR);
    $sql->bindParam(":sexo", $sexo, PDO::PARAM_INT);
    $sql->bindParam(":idPersona", $idPersona, PDO::PARAM_INT);
    
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
