let municipiosPorEstado = {};

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('addDirectionButton');
    const menu = document.getElementById('addDirection');

    button.addEventListener('click', function () {
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        }
    });
});

function openEditModalAddress(addressId, estado, municipio, colonia, cp, calle, num_ext, num_int) {
    const id_input = document.getElementById('address_id_hidden');
    id_input.value = addressId;
    const estado_input = document.getElementById('estado_edit');
    estado_input.options[0].value = estado;
    estado_input.options[0].text = estado;
    const municipio_input = document.getElementById('municipio_edit');
    municipio_input.options[0].value = municipio;
    municipio_input.options[0].text = municipio;

    fetch('/data/municipios.json')
        .then(response => response.json())
        .then(data => {
            if (data[estado]) {
                const municipios = data[estado];
                municipio_input.length = municipios.length;
                municipios.forEach((municipio, index) => {
                    municipio_input.options[index] = new Option(municipio, municipio);
                });
            } else {
                // Si no hay municipios para el estado seleccionado
                municipio_input.length = 1;
                municipio_input.options[0] = new Option("-", "");
            }
        })
        .catch(error => console.error('Error al cargar los municipios:', error));

    const colonia_input = document.getElementById('colonia_edit');
    colonia_input.value = colonia;

    const cp_input = document.getElementById('cp_edit');
    cp_input.value = cp;

    const calle_input = document.getElementById('calle_edit');
    calle_input.value = calle;

    const num_ext_input = document.getElementById('num_ext_edit');
    num_ext_input.value = num_ext;

    const num_int_input = document.getElementById('num_int_edit');
    num_int_input.value = num_int || "";
    
    const modal = document.getElementById('edit-address-modal');
    modal.classList.remove('hidden');
}

function closeModal() {
    const modal = document.getElementById('edit-card-modal');
    modal.classList.add('hidden');
}

function closeModalAddress() {
    const modal = document.getElementById('edit-address-modal');
    modal.classList.add('hidden');
}

function cambiarSelectGenerico(estadoId, municipioId) {
    const estadoSelect = document.getElementById(estadoId);
    const municipioSelect = document.getElementById(municipioId);
    const estado = estadoSelect.value;

    fetch('/data/municipios.json')
        .then(response => response.json())
        .then(data => {
            if (data[estado]) {
                const municipios = data[estado];
                municipioSelect.length = municipios.length;
                municipios.forEach((municipio, index) => {
                    municipioSelect.options[index] = new Option(municipio, municipio);
                });
            } else {
                // Si no hay municipios para el estado seleccionado
                municipioSelect.length = 1;
                municipioSelect.options[0] = new Option("-", "");
            }
        })
        .catch(error => console.error('Error al cargar los municipios:', error));
    municipioSelect.options[0].selected = true;
}


function cambiarSelect() {
    cambiarSelectGenerico('estado', 'municipio');
}

function cambiarSelectEnvio() {
    cambiarSelectGenerico('estadoEnvio', 'municipioEnvio');
}

function cambiarSelectEdit() {
    cambiarSelectGenerico('estado_edit', 'municipio_edit');
}

window.cambiarSelectGenerico = cambiarSelectGenerico;
window.cambiarSelect = cambiarSelect;
window.cambiarSelectEdit = cambiarSelectEdit;
window.cambiarSelectEnvio = cambiarSelectEnvio;
//window.openEditModal = openEditModal;
window.closeModal = closeModal;
window.openEditModalAddress = openEditModalAddress;
window.closeModalAddress = closeModalAddress;