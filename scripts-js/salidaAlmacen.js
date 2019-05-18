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
                <td class = "cdb_pastel">${pastel}</td><td class = "clave_past">${clave}</td><td>${element.descripcion}</td><td><a href="#child4" class="delete" onclick ="delete_user($(this))">Borrar</a></td>
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