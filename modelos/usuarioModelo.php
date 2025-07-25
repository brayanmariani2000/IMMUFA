<?php
require_once "conexionModelo.php";

class usuarioModelo extends conexionModelo{
    
    protected static function agregar_persona($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$correo){
    
        $sql=conexionModelo::conectar()->prepare("INSERT INTO persona(nombre,apellido,cedula,telefono,fecha_nacimiento,correo,sexo,id_parroquia,id_etnia,id_discapacidad)
        
         VALUES ('$nombre','$apellido','$cedula','$telefono','$fecha_naci','$correo','$sexo','52','1','1')");
        
        $sql->execute();
        
        return $sql;



    }
    protected static function agregar_persona_1($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo){
    
        $sql=conexionModelo::conectar()->prepare("INSERT INTO persona(nombre,apellido,cedula,telefono,fecha_nacimiento,correo,sexo,id_parroquia,id_etnia,id_discapacidad)
        
         VALUES ('$nombre','$apellido','$cedula','$telefono','$fecha_naci','null','$sexo','52','1','1')");
        
        $sql->execute();
        
        return $sql;



    }
    
    protected static function nuevo_medico($idPersona,$especialidad){
        
        $sql=conexionModelo::conectar()->prepare("INSERT INTO medico(id_persona,id_especialidad,status) 
        
        VALUES('$idPersona','$especialidad','1')");
        
        $sql->execute();
        
        return $sql;
    }

    protected static function nuevo_usuario($rol,$idPersona,$NombreUsuario,$clave){
        
        $sql=conexionModelo::conectar()->prepare("INSERT INTO usuario(rol,persona_id,usuario,clave,status) 
        
        VALUES('$rol','$idPersona','$NombreUsuario','$clave','1')");
        
        $sql->execute();
        
        return $sql;
    }
    

    protected static function validacion($cedula){

        $sql=conexionModelo::conectar()->prepare("SELECT * FROM persona WHERE cedula='$cedula'");
        
        $sql->execute();
        
        return $sql;
    }
    
    protected static function nuevo_especilidad_modelo($especialidad){

        $sql=conexionModelo::conectar()->prepare("INSERT INTO especialidad(id_especialidad,especialidad,status) 
        
        VALUES('NULL','$especialidad','1')");
        
        $sql->execute();
        
        return $sql;
    }
    
    
    protected static function nueva_dependencia_modelo($dependencia){
        
        $sql=conexionModelo::conectar()->prepare("INSERT INTO dependencias(id_dependencia,dependencia,status) 
        
        VALUES('NULL','$dependencia','1')");
        
        $sql->execute();
        
        return $sql;
    }
    protected static function eliminar_medico_modelo($id){
        
        $sql=conexionModelo::conectar()->prepare("UPDATE `medico` SET `estado`='2' WHERE id_medico='$id'");
        
        $sql->execute();
        
        return $sql;

    }

    protected static function habilitar_medico_modelo($id){
        
        $sql=conexionModelo::conectar()->prepare("UPDATE `medico` SET `estado`='1' WHERE id_medico='$id'");
        
        $sql->execute();
        
        return $sql;

    }

    protected static function eliminar_usuario_modelo($cedula){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE usuario SET `status`=2 WHERE '$cedula'=id_usuario");
       
        $sql->execute();
       
        return $sql;


    }
    protected static function habilitar_usuario_modelo($cedula){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE usuario SET `status`=1 WHERE '$cedula'=id_usuario");
       
        $sql->execute();
       
        return $sql;


    }
    protected static function eliminar_dependencia_modelo($dependencia){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE `dependencias` SET `status`='2' WHERE id_dependencia='$dependencia'");
       
        $sql->execute();
       
        return $sql;
    }
    protected static function habilitar_dependencia_modelo($dependencia){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE `dependencias` SET `status`='1' WHERE id_dependencia='$dependencia'");
       
        $sql->execute();
       
        return $sql;
    }
    protected static function habilitar_area_modelo($area){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE `especialidad` SET `status`='1' WHERE id_especialidad='$area'");
       
        $sql->execute();
       
        return $sql;
    }

    protected static function eliminar_area_modelo($area){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE `especialidad` SET `status`='2' WHERE id_especialidad='$area'");
       
        $sql->execute();
       
        return $sql;

    

    }
    protected static function listar_especialista(){
       
        $sql=conexionModelo::conectar()->prepare("SELECT * FROM medico INNER JOIN persona WHERE medico.id_persona=persona.id_persona");
       
        $sql->execute();
       
        return $sql;

    

    }
    protected static function listar_especialidad_x_cita_moldelo(){
       
        $sql=conexionModelo::conectar()->prepare("SELECT * FROM especialidad ");
       
        $sql->execute();
       
        return $sql;
    }
    public static function listar_usuarios_modal() {
        $sql = conexionModelo::conectar()->prepare("SELECT * FROM `usuario` INNER JOIN rol,persona,parroquia,municipios,etnia,discapacidad
        WHERE usuario.persona_id=persona.id_persona 
        AND persona.id_etnia=etnia.id_etnia
        AND persona.id_discapacidad=discapacidad.id_discapacidad
        AND usuario.rol=rol.id_rol
        AND persona.id_parroquia=parroquia.id_parroquia
        AND parroquia.id_municipios=municipios.id_municipio

");
        
        $sql->execute();
       
        return $sql;
    }

    public static function listar_medicos_modal() {
        $sql = conexionModelo::conectar()->prepare("SELECT * FROM medico 
        INNER JOIN persona ON medico.id_persona = persona.id_persona
        INNER JOIN parroquia ON persona.id_parroquia = parroquia.id_parroquia
        INNER JOIN municipios ON parroquia.id_municipios = municipios.id_municipio
        INNER JOIN etnia ON persona.id_etnia = etnia.id_etnia
        INNER JOIN discapacidad ON persona.id_discapacidad = discapacidad.id_discapacidad
        INNER JOIN especialidad on medico.id_especialidad = especialidad.id_especialidad
");
        
        $sql->execute();
       
        return $sql;
    }  
    protected static function actualizar_especialidad_modelo($id, $nombre) {
        $sql = conexionModelo::conectar()->prepare("UPDATE `especialidad` SET `especialidad` = :nombre WHERE `id_especialidad` = :id");
        
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":id", $id);
        
        $sql->execute();
        
        return $sql;
    }

    protected static function actualizar_dependencias_modelo($id, $nombre) {
        $sql = conexionModelo::conectar()->prepare("UPDATE `dependencias` SET `dependencia` = :nombre WHERE `id_dependencia` = :id");
        
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":id", $id);
        
        $sql->execute();
        
        return $sql;
    }
    protected static function agregar_etnia_modelo($etnia) {
        $sql = conexionModelo::conectar()->prepare("INSERT INTO etnia(etnias, descripcion) VALUES (:etnia, '')");
        $sql->bindParam(":etnia", $etnia);
        $sql->execute();
        return $sql;
    }


    protected static function actualizar_etnia_modelo($id, $etnia) {
        $sql = conexionModelo::conectar()->prepare("UPDATE etnia SET etnias = :etnia WHERE id_etnia = :id");
        $sql->bindParam(":etnia", $etnia);
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql;
    }
    protected static function agregar_discapacidad_modelo($discapacidad) {
        $sql = conexionModelo::conectar()->prepare("INSERT INTO discapacidad(discapacidades, descripcion) VALUES (:discapacidad, '')");
        $sql->bindParam(":discapacidad", $discapacidad);
        $sql->execute();
        return $sql;
    }


    protected static function actualizar_discapacidad_modelo($id, $discapacidad) {
        $sql = conexionModelo::conectar()->prepare("UPDATE discapacidad SET discapacidades = :discapacidad WHERE id_discapacidad = :id");
        $sql->bindParam(":discapacidad", $discapacidad);
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql;
    }
    protected static function agregar_parroquia_modelo($parroquia, $id_municipio) {
        $sql = conexionModelo::conectar()->prepare("INSERT INTO parroquia(parroquias, id_municipios) VALUES (:parroquia, :id_municipio)");
        $sql->bindParam(":parroquia", $parroquia);
        $sql->bindParam(":id_municipio", $id_municipio);
        $sql->execute();
        return $sql;
    }


    protected static function actualizar_parroquia_modelo($id,$parroquia,$id_municipio) {
        $sql = conexionModelo::conectar()->prepare("UPDATE parroquia SET parroquias = :parroquia WHERE id_parroquia = :id AND id_municipios= :id_municipio");
        $sql->bindParam(":parroquia", $parroquia);
        $sql->bindParam(":id_municipio", $id_municipio);
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql;
    }

    
}