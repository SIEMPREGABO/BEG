function actualizarEstado(selectElement) {
    const nuevoEstado = selectElement.value;
    

    const codigoId = selectElement.id.split('-')[1]; // Extrae el ID del select
    const url = `/actualizarCodigo?id_code=${codigoId}&estado=${nuevoEstado}`;
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Actualiza el valor en el select con la respuesta del servidor
            selectElement.value = data.nuevoEstado;
        })
        .catch(error => {
            if(nuevoEstado === '1'){
                selectElement.value = '0';
            }
            if(nuevoEstado === '0'){
                selectElement.value = 1;
            }
        });
}

function cambiarEstado(estado, id){
    let url = `/cambiar-estado?estado=${estado}&id=${id}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        // Recargar la página al recibir los datos
        window.location.reload();
    })
    .catch( window.location.reload());
}



document.querySelectorAll('select[id^="habilitar-"]').forEach(selectElement => {
    selectElement.addEventListener('change', function() {
        actualizarEstado(this);
    });
});

document.getElementById('open-form-code').addEventListener('click', function () {
    document.getElementById('form-code').classList.toggle('hidden'); // Alterna entre mostrar/ocultar
    document.getElementById('add-code').classList.add('hidden'); // Alterna entre mostrar/ocultar
});


window.cambiarEstado = cambiarEstado;