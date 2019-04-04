$(document).ready(function () {
    $('#consultar').click(function (e) { 
          
          $.post("../controller/ControllerConsultarListaProducto.php",{transaccion:"consultar"}, (response) => {
            console.log(response);
            let campos = $.parseJSON(response);
            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.clave_pastel}
                </td>
                <td>
                  ${element.descripcion}
                </td>
                <td>
                  ${element.precio}
                </td>
                <td>
                  ${element.unidad_medida}
                </td>
                <td>
                  ${element.familia}
                </td>
                <td>
                  ${element.subfamilia}
                </td>
                </tr>`
            });

            $('#tbody-entrada').html(registros);
            
            $('form').trigger('reset');
          });
    });

    $('#CodigoB').keyup(function (e) {//Busca un producto en específico
      let palabra = $('#CodigoB').val();
      //console.log(palabra);//Debug
      data = {
        palabra,
        transaccion:"buscar"
      }
      $.post("../controller/ControllerConsultarListaProducto.php", data, (response) => {
          console.log(response);//Debug
          let campos = $.parseJSON(response);

            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.clave_pastel}
                </td>
                <td>
                  ${element.descripcion}
                </td>
                <td>
                  ${element.precio}
                </td>
                <td>
                  ${element.unidad_medida}
                </td>
                <td>
                  ${element.familia}
                </td>
                <td>
                  ${element.subfamilia}
                </td>
                </tr>`
            });
            //$('#thbody-entrada').trigger('reset');

            $('#tbody-entrada').html(registros);

        });
    });
        
});
        
