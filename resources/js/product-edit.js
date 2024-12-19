/**
     * Función para enviar el nombre del botón al endpoint eliminarVariente
     * @param {string} name - El nombre del botón
     */


function eliminarVariante(name, value) {
    // Prevenir el envío del formulario
    if (event) {
        event.preventDefault();
    }

    let url = `/eliminarVariante?${name}=${value}`;
    // Configuración del fetch
    fetch(url)
    .then(
        response => response.json()
    )
    .then(data => {
        console.log(data);
        window.location.reload();
    })
    .catch(error => {
        // Manejo de errores
        console.error('Error:', error);
        alert('Hubo un problema al eliminar la variante.');
    });
}

window.eliminarVariante = eliminarVariante;