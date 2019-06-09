$(document).ready(function () {

    mostrarClavePastel();
    $('form').submit(e => {
        e.preventDefault();
        const data = {
          clave: $('#claveP').val(),
          descripcion: $('#descripcionP').val(),
          precio_entero: $('#precioP_entero').val(),
          precio_decimal: $('#precioP_decimal').val(),
          unidad_medida: $('#unidad_medidaP').val(),
          familia: $('#familiaP').val(),
          subfamilia: $('#subFamiliaP').val()
        };
        
        console.log(data);
        $.post("../controller/ControllerAgregarProducto.php",data, (response) => {
          console.log(response);
          if(response == 1)
            alert('El registro se ingreso de manera correcta.');
          else
            alert('Error al insertar el registro!!!.\nVerifique que la clave del producto no este repetida.');
          //$('form').trigger('reset');
        });
      });
});
/**
 * Muestra en el campo de clave pastel la (clave del último pastel + 1) para que se
 * de la ilusión al usuario de que esta agregando un nuevo pastel
 */
function mostrarClavePastel(){
    $.post("../controller/ControllerListaProducto.php", {transaccion: 'getLastRegister'}, (response) => {
        console.log(response);
        var fila = $.parseJSON(response);
        $('#claveP').val(Number(fila.clave_pastel) + Number(1));
    });
}


