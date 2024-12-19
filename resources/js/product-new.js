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