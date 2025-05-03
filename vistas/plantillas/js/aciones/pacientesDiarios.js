document.addEventListener('DOMContentLoaded', function() {
    // Función para obtener y mostrar las citas por especialidad
    function cargarCitasPorEspecialidad() {
        const container = document.getElementById('citas-especialidades-container');
        
        fetch('ajax/ajaxAnalistaEspecialidad.php')
            .then(response => response.json())
            .then(data => {
                if(data.success && data.data.length > 0) {
                    // Limpiar el contenedor
                    container.innerHTML = '';
                    
                    // Calcular el máximo para las barras de progreso
                    const maxCitas = Math.max(...data.data.map(item => item.cantidad));
                    
                    // Generar HTML para cada especialidad
                    data.data.forEach((especialidad, index) => {
                        const porcentaje = maxCitas > 0 ? (especialidad.cantidad / maxCitas) * 100 : 0;
                        const colores = ['bg-danger', 'bg-info', 'bg-pink', 'bg-success', 'bg-warning'];
                        const color = colores[index % colores.length];
                        
                        const itemHTML = `
                            <div class="m-t-30">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>${especialidad.especialidad.toUpperCase()}</span>
                                    <span>${especialidad.cantidad}</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar ${color} progress-animated" 
                                         style="width: ${porcentaje}%; height:6px;" 
                                         role="progressbar"
                                         aria-valuenow="${especialidad.cantidad}"
                                         aria-valuemin="0"
                                         aria-valuemax="${maxCitas}">
                                    </div>
                                </div>
                            </div>
                        `;
                        
                        container.insertAdjacentHTML('beforeend', itemHTML);
                    });
                    
                    // Agregar fecha de actualización
                    container.insertAdjacentHTML('beforeend', `
                        <div class="text-right mt-3 small text-muted">
                            Actualizado: ${new Date().toLocaleTimeString()}
                        </div>
                    `);
                } else {
                    container.innerHTML = `
                        <div class="alert alert-info">
                            No hay citas registradas para hoy.
                        </div>
                    `;
                }
            })
            .catch(error => {
                container.innerHTML = `
                    <div class="alert alert-danger">
                        Error al cargar los datos: ${error.message}
                    </div>
                `;
                console.error('Error:', error);
            });
    }
    
    // Cargar datos inicialmente
    cargarCitasPorEspecialidad();
    
    // Opcional: Actualizar cada 5 minutos
    setInterval(cargarCitasPorEspecialidad, 300000);
});