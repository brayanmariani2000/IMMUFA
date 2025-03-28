<?php
require_once 'conexionModelo.php';

class citaModelo extends conexionModelo{
protected static function contar_cita_modelo(){
    $sql=conexionModelo::ejecutar_consulta_simple("SELECT * FROM cita ");
    $sql->execute();
    return $sql;
}

protected static function mostrar_cita_modelo(){
    $sql=conexionModelo::ejecutar_consulta_simple("SELECT * FROM `cita` INNER JOIN persona, discapacidad,parroquia,municipios,estados,etnia,dependencias,especialidad,condicion,consulta
    WHERE cita.persona_id=persona.id_persona
    AND cita.dependencia_id=dependencias.id_dependencia
    AND persona.id_discapacidad=discapacidad.id_discapacidad
    AND persona.id_parroquia=parroquia.id_parroquia
    AND parroquia.id_municipios=municipios.id_municipio
    AND municipios.id_estado=estados.id_estado
    AND persona.id_etnia=etnia.id_etnia
    AND cita.id_consulta=consulta.id_consulta
    AND consulta.id_especialidad=especialidad.id_especialidad
    AND cita.condicion_id=condicion.id_condicion");
    $sql->execute();
    return $sql;
  }

  protected static function mostrar_cita_modelo_x_persona($id_cita){
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `cita` INNER JOIN consulta,persona,condicion,especialidad WHERE 
    id_cita='$id_cita' AND 
    cita.persona_id=persona.id_persona AND
    cita.id_consulta=consulta.id_consulta AND 
    cita.condicion_id=condicion.id_condicion AND 
    consulta.id_especialidad=especialidad.id_especialidad;");
    $sql->execute();
    return $sql;
  }
protected static function historia_cita_modelo(){

  $sql=conexionModelo::conectar()->prepare("SELECT 
    p.nombre AS Nombre_Paciente,
    p.apellido AS Apellido_Paciente,
    p.cedula AS Cedula_Paciente,
    e.especialidad AS Especialidad,
    m.nombre AS Nombre_Medico,
    m.apellido AS Apellido_Medico,
    c.fecha_consulta AS Fecha_Atencion,
    ci.fecha_registro AS Fecha_Registro,
    up.nombre AS Nombre_Registrador,  -- Nombre del usuario desde la tabla persona
    up.apellido AS Apellido_Registrador  -- Apellido del usuario desde la tabla persona
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
    persona up ON u.persona_id = up.id_persona;  -- Unir usuario con persona");
  $sql->execute();
  return $sql;
}

}