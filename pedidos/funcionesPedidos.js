function listarPedidos() {
    $.ajax({
        type: "POST",
        url: "obtenerPedido.php",
        dataType: 'json',
        cache: false,
        data: $("#formulario").serialize(),
        success: function (pedidos) {
            const cuerpo = $("#cuerpo");
            cuerpo.empty();

            pedidos.forEach(function (p) {
                const fila = $("<tr>");
                fila.append($("<td>").text(p.numero));
                fila.append($("<td>").text(p.fecha));
                fila.append($("<td>").text(p.direccion));
                fila.append($("<td>").text(p.producto));
                cuerpo.append(fila);
            });
        }
    });
}

$(document).ready(listarPedidos);