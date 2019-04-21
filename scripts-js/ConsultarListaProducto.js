var bEliminar;

$(document).ready(function () 
{
    $('#bConsultar').click(function(){
        actualizarInfo();
    });

    $('#CodigoB').keyup(function (e) //Busca un producto en específico
    {
      let palabra = $('#CodigoB').val();
      //console.log(palabra);//Debug
      data = {
        palabra,
        transaccion:"buscar"
      }
      $.post("../controller/ControllerListaProducto.php", data, (response) => 
      {
          console.log(response);//Debug
          var registros = genTemplate(response);
            if(registros == null){//El registro no fue encontrado
              $('#CodigoB').removeClass('is-valid');
              $('#CodigoB').addClass('is-invalid');
            }else if(palabra == ""){
              $('#CodigoB').removeClass('is-valid');
              $('#CodigoB').removeClass('is-invalid');
            }else{
              $('#CodigoB').removeClass('is-invalid');
              $('#CodigoB').addClass('is-valid');
              $('#tbody-entrada').html(registros);
              $('.bEliminar').click(function (e) 
              {
                  var registro = e.target.id.split("_"); 
                  var option = confirm("Estas Seguro que deseas eliminar el registro " + registro[0]);
                  if(option){
                    eliminarRegistro(e.target.id);
                    limpiar();
                    alert("Registro Elminado");
                    actualizarInfo();
                  }
              });
            }                
      });
    });
});

function eliminarRegistro(registroID){
  data = {
    transaccion: 'eliminar',
    registroID
  }
  $.post("../controller/ControllerListaProducto.php", data,
    function (response) {
      console.log(response);
    }
  );
}

function limpiar(){
  var template = "";
  $('#tbody-entrada').html(template);
  $('form').trigger('reset');
  $('#CodigoB').removeClass('is-valid');
  $('#CodigoB').removeClass('is-invalid');
}
function actualizarInfo(){
  data = {
    transaccion:"consultar"
  }
  $.post("../controller/ControllerListaProducto.php", data, (response) => {
    console.log("Segunda ocasion");//Debug

      var registros = genTemplate(response);

      $('#tbody-entrada').html(registros);
      $('.bEliminar').click(function (e) {
        var registro = e.target.id.split("_"); 
        var option = confirm("Estas Seguro que deseas eliminar el registro " + registro[0]);
        if(option){
          eliminarRegistro(e.target.id);
          limpiar();
          alert("Registro Eliminado");
          actualizarInfo();
        }
    });
    });
}

function genTemplate(response){
  try{
    let campos = $.parseJSON(response);

    var registros = '';

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
        <td>
          <button id="${element.clave_pastel}_editar" class="bEditar btn btn-link">Editar</button>
        </td>
        <td>
          <button id="${element.clave_pastel}_eliminar"class="bEliminar btn btn-link">Eliminar</button>
        </td>
      </tr>`
    });
    return registros;

  }catch(error){
      return null;//Registro no encontrado
  }
      
      
}

