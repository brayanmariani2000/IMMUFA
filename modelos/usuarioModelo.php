<?php
require_once "conexionModelo.php";

class usuarioModelo extends conexionModelo{
    
    protected static function agregar_persona($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$correo){
    
        $sql=conexionModelo::conectar()->prepare("INSERT INTO persona(nombre,apellido,cedula,telefono,fecha_nacimiento,correo,sexo,id_parroquia,id_etnia,id_discapacidad)
        
         VALUES ('$nombre','$apellido','$cedula','$telefono','$fecha_naci','$correo','$sexo','52','0','0')");
        
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
        
        $sql=conexionModelo::conectar()->prepare("INSERT INTO usuario(rol,persona_id,usuario,clave) 
        
        VALUES('$rol','$idPersona','$NombreUsuario','$clave')");
        
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
    protected static function eliminar_medico_modelo($cedula){
        
        $sql=conexionModelo::conectar()->prepare("DELETE FROM medico WHERE '$cedula'=cedula_m");
        
        $sql->execute();
        
        return $sql;

    }

    protected static function eliminar_usuario_modelo($cedula){
       
        $sql=conexionModelo::conectar()->prepare("DELETE FROM usuario WHERE '$cedula'=id_usuario");
       
        $sql->execute();
       
        return $sql;



    }
    protected static function eliminar_dependencia_modelo($dependencia){
       
        $sql=conexionModelo::conectar()->prepare("UPDATE `dependencias` SET `status`='2' WHERE id_dependencia='$dependencia'");
       
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

}