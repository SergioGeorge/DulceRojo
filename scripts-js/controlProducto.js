$(document).ready(function () {
    $('#cConsultar').click(function (e) {

          $.post("../controller/ControllerControlProducto.php",{transaccion:"cConsultar"}, (response) => {
            console.log(response);
            let campos = $.parseJSON(response);
            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.id_pastel}
                </td>
                <td>
                  ${element.codigo_barras}
                </td>
                <td>
                  ${element.estado}
                </td>
                <td>
                  ${element.fecha_elaboracion}
                </td>
                </tr>`
            });

            $('#tbody-entrada').html(registros);

            $('form').trigger('reset');
          });
    });

});
