$(document).ready(function() {
    // Función para validar el formulario
    function validarFormulario() {
        let valido = true;

        // Validar nombre
        if ($('#nombre').val().trim() === '') {
            valido = false;
            $('#nombre').addClass('is-invalid');
        } else {
            $('#nombre').removeClass('is-invalid');
        }

        // Validar apellido
        if ($('#apellido').val().trim() === '') {
            valido = false;
            $('#apellido').addClass('is-invalid');
        } else {
            $('#apellido').removeClass('is-invalid');
        }

        // Validar cédula (6 a 10 dígitos)
        const cedula = $('#cedula').val().trim();
        if (cedula.length < 6 || cedula.length > 10 || isNaN(cedula)) {
            valido = false;
            $('#cedula').addClass('is-invalid');
        } else {
            $('#cedula').removeClass('is-invalid');
        }

        // Validar teléfono (solo números)
        const telefono = $('#telefono').val().trim();
        if (telefono === '' || isNaN(telefono)) {
            valido = false;
            $('#telefono').addClass('is-invalid');
        } else {
            $('#telefono').removeClass('is-invalid');
        }

        // Validar fecha de nacimiento
        if ($('#fecha_naci').val().trim() === '') {
            valido = false;
            $('#fecha_naci').addClass('is-invalid');
        } else {
            $('#fecha_naci').removeClass('is-invalid');
        }

        // Validar municipio
        if ($('#municipio').val() === '0') {
            valido = false;
            $('#municipio').addClass('is-invalid');
        } else {
            $('#municipio').removeClass('is-invalid');
        }

        // Validar parroquia
        if ($('#Parroquia').val() === '0') {
            valido = false;
            $('#Parroquia').addClass('is-invalid');
        } else {
            $('#Parroquia').removeClass('is-invalid');
        }

        // Validar discapacidad
        if ($('#discapacidad_si').is(':checked') && $('#discapacidad').val() === '0') {
            valido = false;
            $('#discapacidad').addClass('is-invalid');
        } else {
            $('#discapacidad').removeClass('is-invalid');
        }

        // Validar etnia
        if ($('#etnia_si').is(':checked') && $('#etnias').val() === '0') {
            valido = false;
            $('#etnias').addClass('is-invalid');
        } else {
            $('#etnias').removeClass('is-invalid');
        }

        // Validar área a consultar
        if ($('#area_consultar').val() === '0') {
            valido = false;
            $('#area_consultar').addClass('is-invalid');
        } else {
            $('#area_consultar').removeClass('is-invalid');
        }

        // Validar dependencia
        if ($('#dependencia').val() === '0') {
            valido = false;
            $('#dependencia').addClass('is-invalid');
        } else {
            $('#dependencia').removeClass('is-invalid');
        }

        // Validar especialista
        if ($('#especialista').val() === '0') {
            valido = false;
            $('#especialista').addClass('is-invalid');
        } else {
            $('#especialista').removeClass('is-invalid');
        }

        // Validar fecha de consulta
        if ($('#fecha_consulta').val().trim() === '') {
            valido = false;
            $('#fecha_consulta').addClass('is-invalid');
        } else {
            $('#fecha_consulta').removeClass('is-invalid');
        }

        // Mostrar u ocultar el botón de registro
        if (valido) {
            $('#mostrarBoton').show();
        } else {
            $('#mostrarBoton').hide();
        }
    }

    // Validar el formulario en tiempo real
    $('input, select').on('input change', function() {
        validarFormulario();
    });

    // Validar el formulario al cargar la página
    validarFormulario();
});