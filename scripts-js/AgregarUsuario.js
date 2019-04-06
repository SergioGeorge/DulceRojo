$(document).ready(function () {
    $('form').submit(e => {
        e.preventDefault();

        var caracteres=",;.:-_{}[]^`´+¨*~}'¿?=)(/&%$#!¡";
        var letras="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        var coruser = 0;
        var corname = 0;
        var corapeP = 0;
        var corapeM = 0;
        //var corpass = 0;

        for(i=0; i<$('#user').val().length; i++){
          if (caracteres.indexOf($('#user').val().charAt(i),0)!=-1){
             coruser = 1;
          }          
        }
        for(i=0; i<$('#name').val().length; i++){
          if (letras.indexOf($('#name').val().charAt(i),0)!=-1){
             
          }
          else{
            corname = 1;
          }         
        }
        for(i=0; i<$('#apellidoP').val().length; i++){
          if (letras.indexOf($('#apellidoP').val().charAt(i),0)!=-1){
             
          }
          else{
            corapeP = 1;
          }       
        }
        for(i=0; i<$('#apellidoM').val().length; i++){
          if (letras.indexOf($('#apellidoM').val().charAt(i),0)!=-1){
             
          }
          else{
            corapeM = 1;
          }        
        }



        if (coruser != 0) {alert("El user debe ser alfanumerico");}
        else if (corname != 0) {alert("El nombre debe ser alfabetico");}
        else if (corapeP != 0) {alert("El apellidoP debe ser alfabetico");}
        else if (corapeM != 0) {alert("El apellidoM debe ser alfabetico");}
        else if ($('#user_password').val().length < 8) {alert("El password debe contener almenos 8 caracteres");}
        else
        {
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
        }


        
      });
});