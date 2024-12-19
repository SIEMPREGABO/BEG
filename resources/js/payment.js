// Obtener los elementos de las tarjetas y el contenedor del brick
const cards = document.querySelectorAll('input[name="tarjeta_seleccionada"]');
const otherPaymentMethod = document.getElementById('other-payment-method');
const brickContainer = document.getElementById('payment-form');
const submitButton = document.getElementById('submit_card_button')

// Función para mostrar/ocultar el Brick según la selección
function toggleBrick() {

    if (this.id === 'other-payment-method') {
        brickContainer.style.display = 'block';
        // Deseleccionar todas las tarjetas si se elige "Otra forma de pago"
        cards.forEach(card => card.checked = false);
        submitButton.style.display = 'none';
    } else {
        // Ocultar el Brick si se selecciona una tarjeta
        brickContainer.style.display = 'none';
        submitButton.style.display = 'block';
        otherPaymentMethod.checked = false; // Deseleccionar la opción "Otra forma de pago"
    }
}

// Agregar evento a las tarjetas
cards.forEach(card => {
    card.addEventListener('change', toggleBrick);
});

// Agregar evento a la opción "Otra forma de pago"
otherPaymentMethod.addEventListener('change', toggleBrick);



