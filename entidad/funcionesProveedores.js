function listarProveedores() {
    $.ajax({
        type: "POST",
        url: "obtenerProveedores.php",
        dataType: 'json',
        cache: false,
        data: $("#formulario").serialize(),
        success: function (proveedores) {
            const cuerpo = $("#cuerpo");
            cuerpo.empty();

            proveedores.forEach(function (p) {
                const fila = $("<tr>");
                fila.append($("<td>").text(p.Nombre));
                fila.append($("<td>").text(p.Nif));
                cuerpo.append(fila);
            });
        }
    });
}

$(document).ready(listarProveedores);