import {server} from "./variables.js";

$(document).ready(function() {
    // Variables para almacenar los valores de los campos
    let especialidad = '';
    let especialista = 0;
    let fechaCita = '';

    // Detectar cambios en el campo de especialidad
    $('#area_consultar').on('change', function() {
        especialidad = $(this).val(); // Obtener el valor seleccionado
        console.log(especialidad)
        verificarCampos(); // Verificar si todos los campos están llenos
        
    });

    // Detectar cambios en el campo de especialista
    $('#especialista').on('change', function() {
        especialista = $(this).val(); // Obtener el valor seleccionado
        console.log(especialista)
        verificarCampos(); // Verificar si todos los campos están llenos
    });

    // Detectar cambios en el campo de fecha de la cita
    $('#fecha_consulta').on('change', function() {
        fechaCita = $(this).val(); // Obtener el valor seleccionado
        console.log(fechaCita)
        verificarCampos(); // Verificar si todos los campos están llenos
    });

    // Función para verificar si todos los campos están llenos
    function verificarCampos() {
        if (especialidad >0 && especialista >0) {
            // Todos los campos están llenos, realizar la petición AJAX
            realizarPeticionAJAX();
           
        }else{
            
        }
    }

    // Función para realizar la petición AJAX
    function realizarPeticionAJAX() {
        // Datos que se enviarán al servidor
        const datos = {
            cantidadPacienteXDia:true,
            especialidad: especialidad,
            especialista: especialista,
            fecha_cita: fechaCita
        };

        // Realizar la petición AJAX
        $.post(`${server}ajax/citaAjax.php`,datos,function(repuesta){
            let cantidaCita=jQuery.parseJSON(repuesta);
            let plantillaCantidad=``
               cantidaCita.forEach(numero => {
                plantillaCantidad=`${numero.cantidadCita}`;
               });
            let plantillafecha=`${fechaCita}`;
            $('#diaAtencion').html(plantillafecha)
            $('#cantidadPacienteXDia').html(plantillaCantidad)
        })
    }
});