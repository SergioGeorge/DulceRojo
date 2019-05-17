var contador=0;
function agregarProd()
{
	var pastel = document.getElementById('CodigoB').value;
	var clave=pastel.substr(0,4);
	const data = {

		codigo: pastel
	};
	$.post("../controller/ControlerNombreTabla.php",data, (response) => {
		console.log(response);

		if (pastel != "")
		{

			contador=contador+1;
			console.log(contador);
			var entrada = '<td>'+pastel+'</td><td>'+clave+'</td><td>'+response+'</td><td><a href="#child4" class="delete" onclick ="delete_user($(this))">Borrar</a></td>';
			document.getElementById('tbody-entrada').insertRow(-1).innerHTML = entrada;

		}
		else {
			alert("Ningun campo debe de estar vacío")
		}
		document.getElementById('CodigoB').value = "";
	});


}
function delete_user(row)
    {
        row.closest('tr').remove();
    }

$(document).ready(function () {

				$('form').submit(e => {
					for (var i=1 ; i <= contador; i++) {
					var deb=document.getElementById("tbody-entrada").rows[i].cells[0].innerHTML;
					var ao =deb.substr(4,2);
					var mes =deb.substr(6,2);
					var dia =deb.substr(8,2);
					var fecha=ao+"-"+mes+"-"+dia;
					var clave=deb.substr(0,4);
					console.log(deb);
		        e.preventDefault();
		        const data = {
		          clave: clave,
		          codigo: deb,
							estado:'Sucursal',
		        date: '20'+fecha
		        };

		        console.log(data);
		        $.post("../controller/ControllerEntradaSucursal.php",data, (response) => {
		          console.log(response);
		          if(response == 1)
		            alert('El registro se ingreso de manera correcta.');
		          else
		            alert('Error al insertar el registro!!!.\nVerifique que la clave de la sucursal no este repetida.');
		          //$('form').trigger('reset');
		        });
					}
		      });


		});
