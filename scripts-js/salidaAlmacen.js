function agregarProd()
{
	var pastel = document.getElementById('CodigoB').value;
	var orden = document.getElementById('NumeroO').value;
	if (pastel != "" && orden != "")
	{
		var entrada = '<td>'+pastel+'</td><td>AC254</td><td>PastelAzul</td><td><a href="">Borrar</a></td>';
		document.getElementById('tbody-entrada').insertRow(-1).innerHTML = entrada;
	}
	else {
		alert("Ningun campo debe de estar vacío");
	}
	document.getElementById('CodigoB').value = "";
	document.getElementById('NumeroO').value = "";
}
