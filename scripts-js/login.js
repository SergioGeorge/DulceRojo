$(document).ready(function () {
    $('form').submit(e => {
        e.preventDefault();
        const data = {
          usuario: $('#usuario').val(),
          password: $('#password').val()
        };
        
        console.log(data);
        $.post("../controller/ControllerLogin.php",data, (response) => {
          console.log("respuesta: " + response);
         
          if(response == 1){
            window.location = "../view/ListaProductos.html";
          }            
          else if(response == 0){
            window.location = "../view/Login.html";
            alert('Fallo al iniciar Sesión');
          }else{
            window.location = "../view/ListaProductos.html";
          }            
          $('form').trigger('reset');
        });
      });
});

