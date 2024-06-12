document.getElementById("buscador").addEventListener("input", function() {
    var input = this.value.toLowerCase();
    var productos = document.getElementsByClassName("producto");

    Array.from(productos).forEach(function(producto) {
        var nombre = producto.querySelector("h2").textContent.toLowerCase();
        var descripcion = producto.querySelector("p").textContent.toLowerCase();
        
        if (nombre.includes(input) || descripcion.includes(input)) {
            producto.style.display = "block";
        } else {
            producto.style.display = "none";
        }
    });
});