function listarClientes() {
    $.ajax({
        type: "POST",
        url: "obtenerClientes.php",
        dataType: 'json',
        cache: false,
        data: $("#formulario").serialize(),
        success: function (clientes) {
            const cuerpo = $("#cuerpo");
            cuerpo.empty();

            clientes.forEach(function (c) {
                const fila = $("<tr>");
                fila.append($("<td>").text(c.Nombre));
                fila.append($("<td>").text(c.Nif));
                cuerpo.append(fila);
            });
        }
    });
}

$(document).ready(listarClientes);