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

/*function openEditModal(cardId, lastDigits, owner, mes, anio) {
    const owner_input = document.getElementById('owner_edit');
    owner_input.value = owner;
    const mes_input = document.getElementById('mes_edit');
    mes_input.value = mes;
    const anio_input = document.getElementById('anio_edit');
    anio_input.value = anio;
    const id_input = document.getElementById('card_id_hidden');
    id_input.value = cardId;
    const put_input = document.getElementById('put');
    put_input.textContent = 'Editar Tarjeta ' + lastDigits;
    const modal = document.getElementById('edit-card-modal');
    modal.classList.remove('hidden');
}¨*/

function openEditModalAddress(addressId, estado, municipio, colonia, cp, calle, num_ext, num_int) {
    var mis_opts, num_opts;
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
                municipio_input.options[0] = new Option("-", "0");
            }
        })
        .catch(error => console.error('Error al cargar los municipios:', error));


    //const municipios = municipiosPorEstado[estado];
    //municipio_input.length = municipios.length;
    //municipios.forEach((municipio, index) => {
    //    municipio_input.options[index] = new Option(municipio, municipio);
    //});

    const colonia_input = document.getElementById('colonia_edit');
    colonia_input.value = colonia;

    const cp_input = document.getElementById('cp_edit');
    cp_input.value = cp;

    const calle_input = document.getElementById('calle_edit');
    calle_input.value = calle;

    const num_ext_input = document.getElementById('num_ext_edit');
    num_ext_input.value = num_ext;

    const num_int_input = document.getElementById('num_int_edit');
    if (num_int !== null) {
        num_int_input.value = num_int;
    }
    const modal = document.getElementById('edit-address-modal');
    modal.classList.remove('hidden');
}

//cierra modal tarjetas

function closeModal() {
    const modal = document.getElementById('edit-card-modal');
    modal.classList.add('hidden');
}

//cierra el modal direcciones

function closeModalAddress() {
    const modal = document.getElementById('edit-address-modal');
    modal.classList.add('hidden');
}

function cambiarSelect() {
    const estados = document.getElementById('estado').value;
    const municipioSelect = document.getElementById('municipio');
    fetch('/data/municipios.json')
        .then(response => response.json())
        .then(data => {
            if (data[estados]) {
                const municipios = data[estados];
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


function cambiarSelectEnvio() {
    const estados = document.getElementById('estadoEnvio').value;
    const municipioSelect = document.getElementById('municipioEnvio');
    fetch('/data/municipios.json')
        .then(response => response.json())
        .then(data => {
            if (data[estados]) {
                const municipios = data[estados];
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
};

function cambiarSelectEdit() {
    const estados = document.getElementById('estado_edit').value;
    const municipioSelect = document.getElementById('municipio_edit');
    fetch('/data/municipios.json')
        .then(response => response.json())
        .then(data => {
            if (data[estados]) {
                const municipios = data[estados];
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


window.cambiarSelect = cambiarSelect;
window.cambiarSelectEdit = cambiarSelectEdit;
window.cambiarSelectEnvio = cambiarSelectEnvio;
//window.openEditModal = openEditModal;
window.closeModal = closeModal;
window.openEditModalAddress = openEditModalAddress;
window.closeModalAddress = closeModalAddress;