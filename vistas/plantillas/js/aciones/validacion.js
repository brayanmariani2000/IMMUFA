document.getElementById('cedula').addEventListener('input', function () {
   var input = this;
   var value = input.value;
   var regex = /^[0-9]{6,10}$/;
   
   if (regex.test(value)) {
     input.classList.remove('is-invalid');
     input.classList.add('is-valid');
   } else {
     input.classList.remove('is-valid');
     input.classList.add('is-invalid');
   }
 });
 $(document).ready(function () {
  // Validar campo de solo letras
  $('#campoLetras').on('input', function () {
      const regex = /^[A-Za-zÁáÉéÍíÓóÚúÜü\s]+$/;
      const valor = $(this).val();
      if (!regex.test(valor)) {
          $(this).val(valor.replace(/[^A-Za-zÁáÉéÍíÓóÚúÜü\s]/g, ''));
      }
      verificarCampos();
  });

  // Validar campo de solo números
  $('#campoNumeros').on('input', function () {
      const regex = /^[0-9]+$/;
      const valor = $(this).val();
      if (!regex.test(valor)) {
          $(this).val(valor.replace(/[^0-9]/g, ''));
      }
      verificarCampos();
  });

  // Validar campo select
  $('#campoSelect').on('change', function () {
      verificarCampos();
  });

  // Función para verificar si todos los campos están llenos
  function verificarCampos() {
      const campoLetras = $('#campoLetras').val();
      const campoNumeros = $('#campoNumeros').val();
      const campoSelect = $('#campoSelect').val();

      if (campoLetras && campoNumeros && campoSelect) {
          $('#botonGuardar').show();
      } else {
          $('#botonGuardar').hide();
      }
  }
});