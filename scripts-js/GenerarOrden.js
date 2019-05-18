var contador=0;
function agregarProd()
{
    var can = document.getElementById('cantidad').value;
    var orden = document.getElementById('no_orden').value;
    var pastel = document.getElementById('id_pastel').value;
	

		if (pastel != "")
		{

			contador=contador+1;
			console.log(contador);
			var entrada = '<td>'+can+'</td><td>'+orden+'</td><td>'+pastel+'</td><td><a href="#child4" class="delete" onclick ="delete_user($(this))">Borrar</a></td>';
			document.getElementById('tbody-entrada').insertRow(-1).innerHTML = entrada;

		}
		else {
			alert("Ningun campo debe deestar vacío")
		}
        document.getElementById('cantidad').value = "";
        document.getElementById('no_orden').value = "";
        document.getElementById('id_pastel').value = "";
	


}
function delete_user(row)
    {
        row.closest('tr').remove();


    }


$(document).ready(function () {

		$('form').submit(e => {
            for (var i=1 ; i <= contador; i++) {
        e.preventDefault();
        const data = {
            cantidad: $('#cantidad').val(),
            no_orden: $('#no_orden').val(),
            id_pastel: $('#id_pastel').val()
          };

        console.log(data);
        $.post("../controller/ControllerGenerarOrden.php",data, (response) => {
          console.log(response);
          if(response == 1)
            alert('El registro se ingreso de manera correcta.');
          else
            alert('Error al insertar el registro!!!.\nVerifique que la clave producto exista.');
          //$('form').trigger('reset');
        });
			}
      });


});
