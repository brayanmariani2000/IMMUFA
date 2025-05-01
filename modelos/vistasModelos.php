<?php
class vistasModelo{

    protected static function obtener_vistas_modelos($vistas){
        
        $listaBlanca=['inicio','tabla','formulario','formularioPaciente','home','informacion','reportes','reportesEdad','reportesDependencia','reportesDireccion','reportesCitas',
        'login','exito','tablaDiscapacidad','nuevaDependencia','nuevoUsuario','nuevaArea','tablaCita','inicio2','datosPaciente','nuevaCita','HistoriaCita','tablaEspecialidad','tablaCitasAtendidas','tablaCitasPerdidas'];
        if (in_array($vistas,$listaBlanca)) {
        $contenido=$vistas;
        }elseif ($vistas=="home" || $vistas=="index")
        {
            $contenido="home";
        }else {
            $contenido="404";
        }
        return $contenido;
    }

  
}
