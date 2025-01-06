document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('user-movil-button');
    const menu = document.getElementById('mobile-menu');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        menu.classList.toggle('hidden');

        // Optional: update aria-expanded attribute
    });

    // Optional: hide the menu when clicking outside of it
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
        // Toggle the hidden class on the menu
        menu.classList.toggle('hidden');

        // Optional: update aria-expanded attribute
    });

    // Optional: hide the menu when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('dropdownSearchButton');
    const menu = document.getElementById('dropdownSearch');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        menu.classList.toggle('hidden');

        // Optional: update aria-expanded attribute
        const isExpanded = menu.classList.contains('hidden') ? 'false' : 'true';
        button.setAttribute('aria-expanded', isExpanded);
    });

    // Optional: hide the menu when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
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

function toggleDivs(showId, hideId) {
    // Mostrar el div seleccionado
    document.getElementById(showId).style.display = "block";

    // Ocultar el otro div
    document.getElementById(hideId).style.display = "none";

    // Deseleccionar el radio opuesto
    if(hideId === 'SinVariante'){
        document.getElementById('variante').checked = true;
        document.getElementById('no_variante').checked = false;
    }
    if(hideId === 'ConVariante'){
        document.getElementById('no_variante').checked = true;
        document.getElementById('variante').checked = false;

    }
    //document.getElementById(`#${hideId === "SinVariante" ? "No_variante" : "variante"}`).checked = false;
}


function toggleVariantes(value) {
    let variantes = ["material", "weight", "length", "size","wholesale","materialendurance","weightlength"];
    // Verifica que el valor se está pasando correctamente
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
            console.log('variante'+variantes[i]);
            document.getElementById('variante'+variantes[i]).value = "";
            document.getElementById(variantes[i]).style.display = "none";
        }
    }   
}

window.toggleDivs =toggleDivs;
window.toggleVariantes = toggleVariantes;
window.handleCheckboxChange = handleCheckboxChange;
window.eliminarVariante = eliminarVariante;