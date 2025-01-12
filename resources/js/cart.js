
document.querySelectorAll('input[type="number"]').forEach(input => {
    let cantidadAnterior = parseInt(input.value);
    input.addEventListener('change', function () {
        input.disabled = true;
        const inputs = document.querySelectorAll('input[type="number"]');
        let indicesUsados = new Set();
        inputs.forEach((input, index) => {
            const dataIndex = parseInt(input.getAttribute('data-index'));
            if (indicesUsados.has(dataIndex)) {
                return; // Ignorar este input
            }
            // Asegurar que los índices sean consecutivos (0, 1, 2, ...)
            if (dataIndex !== index) {
                input.setAttribute('data-index', index); // Corregir el índice
            }

            indicesUsados.add(index);
        });

        const index = this.getAttribute('data-index'); // Obtener el índice del producto
        //const precio = parseFloat(this.getAttribute('data-precio')); // Obtener el precio del producto
        const cantidadInput = parseInt(this.value);
       

        //console.log(cantidadInput);
        // Actualizar el subtotal en la interfaz

        if (cantidadInput < 1 || cantidadInput % 1 !== 0 || cantidadInput > 1000) {
            document.getElementById(`cantidad-${index}`).value = cantidadAnterior;
            input.disabled = false;
            return;
        }

        let url = `/actualizarCarrito?index=${index}&cantidad=${cantidadInput}`;

        fetch(url)
            .then(
                response => response.json()
            )
            .then(data => {
                window.location.reload(); 
            })
            .catch(error => {
                document.getElementById(`cantidad-${index}`).value = cantidadAnterior;
                input.disabled = false;
            });
        // Aquí podrías también actualizar el total del carrito si lo necesitas

    });
});

/*
function actualizarTotal() {
    let total = 0;
    document.querySelectorAll('input[type="number"]').forEach(input => {
        const precio = parseFloat(input.getAttribute('data-precio'));
        const cantidad = parseInt(input.value);
        total += precio * cantidad;
    });
    document.getElementById('total').innerText = `$ ${total.toFixed(2)}`; // Actualiza el total
}

window.actualizarTotal = actualizarTotal;*/