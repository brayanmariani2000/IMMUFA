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
