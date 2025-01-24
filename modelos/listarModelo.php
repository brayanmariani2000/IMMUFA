<?php
require_once "conexionModelo.php";

class listarModelo extends conexionModelo{

protected static function listar_etnias(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM etnia WHERE id_etnia>0");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_discapacidad(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM discapacidad WHERE id_discapacidad>0");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_especialidad(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM especialidad");
    
    $sql->execute();
    
    return $sql;

}
protected static function listar_medico(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `medico` INNER JOIN especialidad,persona 
    
    WHERE medico.id_especialidad=especialidad.id_especialidad 
    
    AND persona.id_persona=medico.id_persona");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_municipio(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM municipios");
    
    $sql->execute();
    
    return $sql;

}
protected static function listar_parroquia(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM parroquia");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_dependencia(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM dependencias");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_dias(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM dias");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_turno(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM turno");
    
    $sql->execute();
    
    return $sql;
}
protected static function tabla_usuario(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `usuario` INNER JOIN rol,persona WHERE usuario.persona_id=persona.id_persona AND usuario.rol=rol.id_rol");
    
    $sql->execute();
    
    return $sql;
}

protected static function especilidad_cant_paciente_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `consulta` INNER JOIN especialidad WHERE especialidad.id_especialidad=consulta.especialidad");
    
    $sql->execute();
    
    return $sql;

}

protected static function listar_roles_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM  rol ");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_condicion_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM  condicion ");
    
    $sql->execute();
    
    return $sql;
}
}