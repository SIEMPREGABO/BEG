
document.querySelectorAll('input[type="number"]').forEach(input => {
    let cantidadAnterior = parseInt(input.value);
    input.addEventListener('change', function() {
        const index = this.getAttribute('data-index'); // Obtener el índice del producto
        const precio = parseFloat(this.getAttribute('data-precio')); // Obtener el precio del producto
        const cantidadInput = parseInt(this.value);
        console.log(cantidadInput);
        // Actualizar el subtotal en la interfaz
       


        let url = `/actualizarCarrito?index=${index}&cantidad=${cantidadInput}`;
        //console.log(url);
    
        fetch(url)
            .then(
                response => response.json()
            )
            .then(data => {
                //const cantidad = parseInt(this.value); // Obtener la cantidad nueva
                const cantidad = data.cantidad; // Obtener la cantidad nueva        
                const nuevoSubtotal = (precio * cantidad).toFixed(2); // Calcular el nuevo subtotal
        
                document.getElementById(`subtotal-${index}`).innerText = `$ ${nuevoSubtotal}`;
                actualizarTotal();
                window.location.reload();
            })
            .catch(error => {
                document.getElementById(`cantidad-${index}`).value = cantidadAnterior;
            });
        // Aquí podrías también actualizar el total del carrito si lo necesitas
        
    });
});

function actualizarTotal() {
    let total = 0;
    document.querySelectorAll('input[type="number"]').forEach(input => {
        const precio = parseFloat(input.getAttribute('data-precio'));
        const cantidad = parseInt(input.value);
        total += precio * cantidad;
    });
    document.getElementById('total').innerText = `$ ${total.toFixed(2)}`; // Actualiza el total
}

window.actualizarTotal = actualizarTotal;