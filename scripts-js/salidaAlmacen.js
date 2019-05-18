var contador=0;
function agregarProd()
{
	var pastel = document.getElementById('CodigoB').value;
	var clave=pastel.substr(0,4);
	const data = {

		codigo: clave
	};
	$.post("../controller/ControllerNombreProduct.php",data, (response) => {
		console.log(response);

		let campos = $.parseJSON(response);
        let registros = '';

        campos.forEach(element => {
              registros += `
              <tr>
                <td class = "cdb_pastel">
                  ${pastel}
                </td>
                <td class = "clave_past">
                  ${clave}
                </td>
                <td>
                  ${element.descripcion}
                </td>
                <td><a href="#child4" class="delete" onclick ="delete_user($(this))">Borrar</a></td>
                </tr>`
            });

            $('#tbody-entrada').html(registros);
         
		document.getElementById('CodigoB').value = "";
	});


}
function delete_user(row)
    {
        row.closest('tr').remove();
    }

$(document).ready(function () {
	$('form').submit(e => {
		e.preventDefault();
		const noOrden = {
			no_Ord: $('#NumeroO').val()
		};

		var claves = [];
		var list_claves = [];
		var list_cb = [];
		var filas = $('#tbody-entrada').find('tr');
		var compare;
		for(i=0; i<filas.length; i++)
		{
			var celdas = $(filas[i]).find("td");
			list_claves.push($(celdas[1]).text());
			list_cb.push($(celdas[0]).text());
		}


		$.post("../controller/ControllerNoOrden.php",noOrden, (response) => {
			console.log(response);
			if(response == 1)
			{
				//alert('El registro se ingreso de manera correcta.');
				let campos = $.parseJSON(response);
		        let registros = '';

		        campos.forEach(element => {
		        	claves.push(element.clave_pastel);
		        });
		        claves.sort();
				list_claves.sort();
				compare = claves.length==list_claves.length && list_claves.every(function(v,i) { return v === list_claves[i] } );
				if (compare)
				{
					for (var i = 0; i < list_cb.length; i++) {

						const product = {
							codBar: list_cb[i],
							estado: 'Transporte'
						};
						$.post("../controller/ControllerSalidaAlmacen.php",product, (response) => {
							console.log(response);
							if(response == 1)
							{
								console.log("Registro correcto de: "+list_cb[i]);
							}
							else
							{
								console.log("ERROR en: "+list_cb[i]);
							}
						});
					}
				} else {
					alert("La lista de productos no es correcta. Verifique orden de entrega.")
				}

			}
			else
			alert('Error al insertar el registro!!!.\nVerifique que la clave de la sucursal no este repetida.');
			//$('form').trigger('reset');
		});
	});
});
