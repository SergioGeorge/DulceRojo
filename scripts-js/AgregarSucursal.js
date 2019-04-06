$(document).ready(function () {
    $('form').submit(e => {
        e.preventDefault();
        const data = {
          clave: $('#ClaveS').val(),
          nombre: $('#NombreS').val(),
        direccion: $('#DireccionS').val()
        };

        console.log(data);
        $.post("../controller/ControllerAgregarSucursal.php",data, (response) => {
          console.log(response);
          if(response == 1)
            alert('El registro se ingreso de manera correcta.');
          else
            alert('Error al insertar el registro!!!.\nVerifique que la clave de la sucursal no este repetida.');
          //$('form').trigger('reset');
        });
      });
});
