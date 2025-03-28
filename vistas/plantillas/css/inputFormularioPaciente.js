
document.addEventListener("DOMContentLoaded", function() {
  // Configuración para Fecha de Nacimiento (no mayor a hoy)
  flatpickr("#fecha_naci", {
    dateFormat: "Y-m-d",  // Formato: Año-Mes-Día
    maxDate: "today",     // No permite fechas futuras
    locale: "es",         // Idioma español
    onChange: function(selectedDates) {
      console.log("Fecha de nacimiento seleccionada:", selectedDates[0]);
    }
  });

  // Configuración para Fecha de Cita (no menor a hoy)
  flatpickr("#fecha_consulta", {
    dateFormat: "Y-m-d",
    minDate: "today",     // No permite fechas pasadas
    locale: "es",
    onChange: function(selectedDates) {
      console.log("Fecha de cita seleccionada:", selectedDates[0]);
    }
  });
});