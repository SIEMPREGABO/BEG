document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('user-movil-button');
    const menu = document.getElementById('mobile-menu');
    button.addEventListener('click', function () {
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('user-menu-button');
    const menu = document.getElementById('user-menu');

    button.addEventListener('click', function () {
        menu.classList.toggle('hidden');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('dropdownSearchButton');
    const menu = document.getElementById('dropdownSearch');

    button.addEventListener('click', function () {
        menu.classList.toggle('hidden');
    });
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        setTimeout(function () {
            successMessage.classList.add('hidden');
        }, 5000);
    }
});


function handleCheckboxChange(userId, isChecked) {
    let url = `/actualizar-usuario-mayorista?userId=${userId}&isChecked=${isChecked}`; 
    fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {        
        window.location.reload();
    })
}

function eliminarVariante(name, value) {
    let url = `/eliminarVariante?${name}=${value}`;
    fetch(url)
    .then(
        response => response.json()
    )
    .then(data => {
        console.log(data);
        window.location.reload();
    })
    .catch(error => {
        alert('Hubo un problema al eliminar la variante.');
    });
}

function toggleDivs(showId, hideId) {
    document.getElementById(showId).style.display = "block";
    document.getElementById(hideId).style.display = "none";
    if(hideId === 'SinVariante'){
        document.getElementById('variante').checked = true;
        document.getElementById('no_variante').checked = false;
    }
    if(hideId === 'ConVariante'){
        document.getElementById('no_variante').checked = true;
        document.getElementById('variante').checked = false;
    }
}


function toggleVariantes(value) {
    let variantes = ["material", "weight", "length", "size","wholesale","materialendurance","weightlength"];
    if(value === ''){
        document.getElementById('preciodiv').style.display = "none";
        for(let i=0;i<variantes.length;i++){
            document.getElementById(variantes[i]).style.display = "none";
        }  
        return; 
    }
    document.getElementById(value).style.display = "block";
    document.getElementById('preciodiv').style.display = "block";
    for(let i=0;i<variantes.length;i++){
        if(variantes[i] !== value){
            document.getElementById('variante'+variantes[i]).value = "";
            document.getElementById(variantes[i]).style.display = "none";
        }
    }   
}

window.cambiarEstado = cambiarEstado;
window.toggleDivs =toggleDivs;
window.toggleVariantes = toggleVariantes;
window.handleCheckboxChange = handleCheckboxChange;
window.eliminarVariante = eliminarVariante;
window.actualizarEstado = actualizarEstado;

function actualizarEstado(selectElement) {
    const nuevoEstado = selectElement.value;
    const codigoId = selectElement.id.split('-')[1]; 
    const url = `/actualizarCodigo?id_code=${codigoId}&estado=${nuevoEstado}`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
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
    document.getElementById('form-code').classList.toggle('hidden'); 
    document.getElementById('add-code').classList.add('hidden'); 
});


