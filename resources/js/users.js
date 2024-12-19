
function handleCheckboxChange(userId, isChecked) {
    // Definir la URL del endpoint al que se enviarán los datos
    let url = `/actualizar-usuario-mayorista?userId=${userId}&isChecked=${isChecked}`; // Ajusta esta URL según tu ruta en Laravel

  
    // Configuración del fetch
    fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        // Recargar la página al recibir los datos
        
        window.location.reload();
    })
    .catch(window.location.reload());



   
    
}

window.handleCheckboxChange = handleCheckboxChange;