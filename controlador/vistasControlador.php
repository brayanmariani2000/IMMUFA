<?php
require_once "./modelos/vistasModelos.php";

class vistasControlador extends vistasModelo{
public function obtener_plantilla_controlador(){

    return require_once "./vistas/plantilla.php";
}
public function obtener_vistas_controlador() {
    if (isset($_GET['page'])) {
        return vistasModelo::obtener_vistas_modelos($_GET['page']);
    }
    return "home";
}

}