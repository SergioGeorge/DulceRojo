$(document).ready(function () {
    $('#consultar').click(function (e) { 
          
          $.post("../controller/ControllerConsultarUsuarios.php",{transaccion:"consultar"}, (response) => {
            console.log(response);
            let campos = $.parseJSON(response);
            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.user_var}
                </td>
                <td>
                  ${element.user_name}
                </td>
                <td>
                  ${element.ape_pat}
                </td>
                <td>
                  ${element.ape_mat}
                </td>
                <td>
                  ${element.user_rol}
                </td>
                <td>
                  ${element.user_pas}
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
      $.post("../controller/ControllerConsultarUsuarios.php", data, (response) => {
          console.log(response);//Debug
          let campos = $.parseJSON(response);

            let registros = '';

            campos.forEach(element => {
              registros += `
              <tr>
                <td>
                  ${element.user_var}
                </td>
                <td>
                  ${element.user_name}
                </td>
                <td>
                  ${element.ape_pat}
                </td>
                <td>
                  ${element.ape_mat}
                </td>
                <td>
                  ${element.user_rol}
                </td>
                <td>
                  ${element.user_pas}
                </td>
                </tr>`
            });
            //$('#thbody-entrada').trigger('reset');

            $('#tbody-entrada').html(registros);

        });
    });
        
});