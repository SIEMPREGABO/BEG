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

// Añadir evento 'change' a todos los selects que empiezan con "habilitar-"
document.querySelectorAll('select[id^="habilitar-"]').forEach(selectElement => {
    selectElement.addEventListener('change', function() {
        actualizarEstado(this);
    });
});

document.getElementById('open-form-code').addEventListener('click', function () {
    document.getElementById('form-code').classList.toggle('hidden'); // Alterna entre mostrar/ocultar
    document.getElementById('add-code').classList.add('hidden'); // Alterna entre mostrar/ocultar

});

/*
function mostrarFormularioCodigo() {
    document.getElementById('addCard').classList.remove('hidden');
    document.getElementById('addCode').classList.remove('hidden');
    const radios = document.querySelectorAll('input[name="tarjeta_seleccionada"]');
    radios.forEach(radio => {
        radio.checked = false;
    });
}*/