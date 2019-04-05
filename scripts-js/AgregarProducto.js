$(document).ready(function () {
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


