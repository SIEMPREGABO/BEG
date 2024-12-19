
export function cambiarEstado(estado, id){
    let url = `/cambiar-estado?estado=${estado}&id=${id}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        // Recargar la página al recibir los datos
        window.location.reload();
    })
    .catch( window.location.reload());
}

window.cambiarEstado = cambiarEstado;