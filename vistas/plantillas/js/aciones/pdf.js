$(document).ready(function(e){
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems)
$('#pdf_cita').click(function(e){
  var tabla = document.getElementById("tablaCita");
        var datos = [];

        for (var i = 1; i < tabla.rows.length; i++) {
            var fila = tabla.rows[i];
            var filaDatos = {
                numero: fila.cells[0].innerText,
                nombre: fila.cells[1].innerText,
                cedula:fila.cells[2].innerText,
                areaConsulta:fila.cells[3].innerText,
                fechaConsulta:fila.cells[4].innerText,
                dependencia:fila.cells[5].innerText,
            };
            datos.push(filaDatos);
        }
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "componentes/pdf/tuto2.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(JSON.stringify(datos));

    


  })
  
})