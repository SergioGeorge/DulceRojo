$(document).ready(function () {
    $('#consultar').click(function (e) {

          $.post("../controller/ControllerConsultarSucursal.php",{transaccion:"consultar"}, (response) => {
            console.log(response);
            let campos = $.parseJSON(response);
            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.clave_suc}
                </td>
                <td>
                  ${element.nombre}
                </td>
                <td>
                  ${element.direccion}
                </td>
                </tr>`
            });

            $('#tbody-entrada').html(registros);

            $('form').trigger('reset');
          });
    });

    $('#ClaveS').keyup(function (e) {//Busca un producto en específico
      let palabra = $('#ClaveS').val();
      //console.log(palabra);//Debug
      data = {
        palabra,
        transaccion:"buscar"
      }
      $.post("../controller/ControllerConsultarListaSucursal.php", data, (response) => {
          console.log(response);//Debug
          let campos = $.parseJSON(response);

            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.clave_suc}
                </td>
                <td>
                  ${element.nombre}
                </td>
                <td>
                  ${element.direccion}
                </td>
                </tr>`
            });
            //$('#thbody-entrada').trigger('reset');

            $('#tbody-entrada').html(registros);

        });
    });

});
