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


}