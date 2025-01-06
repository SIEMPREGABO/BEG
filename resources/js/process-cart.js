




function mostrarFormularioDireccion() {
    document.getElementById('addDirection').classList.remove('hidden');
    const radios = document.querySelectorAll('input[name="direccion_seleccionada"]');
    radios.forEach(radio => {
        radio.checked = false;
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const menu = document.getElementById('addDirection');
    const radios = document.querySelectorAll('input[name="direccion_seleccionada"]');
    const menucard = document.getElementById('addCard');
    const radiosCard = document.querySelectorAll('input[name="tarjeta_seleccionada"]');


    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            // Cierra el formulario de agregar dirección si está abierto
            if (!menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }
        });
    });

    const municipio = document.getElementById('municipioEnvio');
    const estado = document.getElementById('estadoEnvio');
    const cp = document.getElementById('cp');
    const colonia = document.getElementById('colonia');
    const calle = document.getElementById('calle');
    const num_ext = document.getElementById('num_ext');
   
    if (
        municipio.value !== "0" || 
        estado.value !== "0" || 
        cp.value !== '' || 
        colonia.value !== '' || 
        calle.value !== '' || 
        num_ext.value !== ''
    ) {
        cambiarSelectEnvio();
        radios.forEach(radio => {
            radio.checked = false;
        });
        menu.classList.remove('hidden');
    } 

    radiosCard.forEach(radio => {
        radio.addEventListener('change', function () {
            // Cierra el formulario de agregar dirección si está abierto
            if (!menucard.classList.contains('hidden')) {
                menucard.classList.add('hidden');
            }
        });
    });

    


});


window.mostrarFormularioDireccion = mostrarFormularioDireccion;
