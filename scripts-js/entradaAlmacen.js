function agregarProd()
{
	var pastel = document.getElementById('CodigoB').value;
	if (pastel != "")
	{
		var entrada = '<td>'+pastel+'</td><td>AC254</td><td>PastelAzul</td><td><a href="">Borrar</a></td>';
		document.getElementById('tbody-entrada').insertRow(-1).innerHTML = entrada;
	}
	document.getElementById('CodigoB').value = "";
}