function abrirMenu() {
    var menu = document.getElementById("fotoperfil");
    if (menu.style.display === "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
}

document.addEventListener("click", function(event) {
    var menu = document.getElementById("fotoperfil");
    var perfil = document.getElementById("usuarionavbar");

    if (menu && perfil && !perfil.contains(event.target) && !menu.contains(event.target)) {
        menu.style.display = "none";
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const cpf = document.querySelector('input[name="cpf"]');
    if (cpf) {
        cpf.addEventListener('input', function(dividir) {
            let valor = dividir.target.value;
            valor = valor.replace(/\D/g, '');
            if (valor.length > 11) {
                valor = valor.slice(0, 11);
            }
            if (valor.length >= 4) {
                valor = valor.slice(0, 3) + '.' + valor.slice(3);
            }
            if (valor.length >= 8) {
                valor = valor.slice(0, 7) + '.' + valor.slice(7);
            }
            if (valor.length >= 12) {
                valor = valor.slice(0, 11) + '-' + valor.slice(11);
            }       
            dividir.target.value = valor;
        });
    }
});
