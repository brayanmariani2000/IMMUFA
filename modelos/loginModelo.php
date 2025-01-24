<?php
require_once "conexionModelo.php";

class loginModelo extends conexionModelo{
/*----------modelo para inicia sesion---------*/
/* el selec no lo ejecuta pero cuando cambio para insertar se ejecuta solo necesito validar el correo y contraseña para ver el codigo 
ve a loginControlador y a login que esta en la carpeta vistas/contenido */
public function iniciar_sesion_modelo($usuario){
    $chec_correo=conexionModelo::ejecutar_consulta_simple("SELECT * FROM usuario INNER JOIN persona,rol WHERE usuario='$usuario' 
    AND id_persona=persona_id
    AND rol=id_rol");
    return $chec_correo;
}
}