$(document).ready(function () {
	$('#saveSal').click(e => {
		console.log("Encontro el archivo");
		e.preventDefault();
		const noOrden = {
			no_Ord: $('#NumeroO').val()
		};

		var claves = [];
		var list_claves = [];
		var list_cb = [];
		var filas = $('#tbody-entrada').find('tr');
		var compare;
		var idpa;
		var cdba;
		var i;
		for(i=0; i<filas.length; i++)
		{
			//var celdas = $(filas[i]).find("td");
			list_claves.push(document.getElementById("tbody-entrada").rows[i].cells[1].innerHTML);
			list_cb.push(document.getElementById("tbody-entrada").rows[i].cells[0].innerHTML);
		}
        
        console.log(list_claves);
        console.log(list_cb);


		$.post("../controller/ControllerNoOrden.php",noOrden, (response) => {
			console.log(response);
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
				list_cb.forEach(function(element){
				    cdba = ""+element;
					const product = {
						cod_Bar: cdba,
						estado: 'TRANSPORTE'
					};
					console.log(product);
					$.post("../controller/ControllerSalidaAlmacen.php",product, (response) => {
						console.log(response);
						if(response == 1)
						{
							console.log("Registro correcto de: "+element);
						}
						else
						{
							console.log("ERROR en: "+element);
						}
					});
				});
			} else {
				alert("La lista de productos no es correcta. Verifique orden de entrega.");
			}
		});
	});
});