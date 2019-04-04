$(document).ready(function () {
    $('form').submit(e => {
        e.preventDefault();
        const data = {
          user: $('#user').val(),
          name: $('#name').val(),
          apellidoP: $('#apellidoP').val(),
          apellidoM: $('#apellidoM').val(),
          user_Rol: $('#user_Rol').val(),
          user_password: $('#user_password').val()
        };
        
        console.log(data);
        $.post("../controller/ControllerAgregarUsuario.php",data, (response) => {
          console.log(":) " + response);
          $('form').trigger('reset');
        });
      });
});