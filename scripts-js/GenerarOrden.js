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
                var deb=document.getElementById("tbody-entrada").rows[i].cells[0].innerHTML;
                var deb2=document.getElementById("tbody-entrada").rows[i].cells[1].innerHTML;
                var deb3=document.getElementById("tbody-entrada").rows[i].cells[2].innerHTML;
                var can=deb.substr(0,11);
                var orden=deb2.substr(0,11);
                var pastel=deb3.substr(0,11);

        e.preventDefault();
        const data = {
            cantidad: can,
            no_orden: orden,
            id_pastel: pastel
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
