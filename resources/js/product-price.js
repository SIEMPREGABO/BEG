function getPrice() {
    let productId = document.getElementById('product').value;
    let material_id = null, endurance_id = null, size_id = null;
    let weight_id = null, length_id = null, wholesale_id = null;
    
    if (document.getElementById('materialEndurance')) material_id = document.getElementById('materialEndurance').value;
    if (document.getElementById('enduranceMaterial')) endurance_id = document.getElementById('enduranceMaterial').value;
    if (document.getElementById('weight')) weight_id = document.getElementById('weight').value;
    if (document.getElementById('material')) material_id = document.getElementById('material').value;
    if (document.getElementById('weightLength')) weight_id = document.getElementById('weightLength').value;
    if (document.getElementById('lengthWeight')) length_id = document.getElementById('lengthWeight').value;
    if (document.getElementById('length')) length_id = document.getElementById('length').value;
    if (document.getElementById('wholesale')) wholesale_id = document.getElementById('wholesale').value;
    if (document.getElementById('size')) size_id = document.getElementById('size').value;

    let array = [material_id, endurance_id, weight_id, size_id, wholesale_id, length_id];
    let array3 = ['material_id', 'endurance_id', 'weight_id', 'size_id', 'wholesale_id', 'length_id'];

    let url = `/get-price?product_id=${productId}`;

    for (let i = 0; i < array.length; i++) {
        if (array[i] !== null) {  // Comprobar si el valor no es null
            url = url + `&${array3[i]}=${array[i]}`;
        }
    }
    
    for (let i = 0; i < array.length; i++) {
        if (array[i] === '0') {  // Comprobar si el valor no es null
            document.getElementById('price').innerText = `$ - `;
            document.getElementById('precio').value = '';
            document.getElementById('submitButton').setAttribute('disabled','disabled');
            return;
        }
    }

    //console.log(url);

    fetch(url)
        .then(
            response => response.json()
        )
        .then(data => {
            //console.log(data.producto);
            if (data.price === null) {
                document.getElementById('price').innerText = `$ - `;
                document.getElementById('submitButton').setAttribute('disabled','disabled');
            } else {
                document.getElementById('price').innerText = `$${data.producto.precio}`;
                document.getElementById('precio').value = `${data.producto.precio}`;
                document.getElementById('ancho').value = `${data.producto.ancho}`;
                document.getElementById('alto').value = `${data.producto.alto}`;
                document.getElementById('largo').value = `${data.producto.largo}`;
                document.getElementById('peso').value = `${data.producto.peso}`;
                document.getElementById('submitButton').removeAttribute('disabled');
            }

        })
        .catch(error => console.error('Error:', error));
}

/*
document.addEventListener('DOMContentLoaded', function () {
    getPrice();
});*/



window.getPrice = getPrice;