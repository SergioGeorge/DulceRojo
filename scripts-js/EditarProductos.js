$(document).ready(function () {
    //Obtener los datos de la url
    let cadena = location.search;
    let clave_pastel = cadena.split("=")[1];
    consultarDatosPastel(clave_pastel);
    $('form').submit(e => {
        e.preventDefault();
        
        let clave_pastel = $("#claveP").val();        
        let descripcion = $("#descripcionP").val();
        let precioEntero = $("#precioP_entero").val();
        let precioDecimal = $("#precioP_decimal").val();
        let precio = `${precioEntero}.${precioDecimal}`;
        let unidad_medida = $("#unidad_medidaP").val();
        let familia = $("#familiaP").val();
        let subfamilia = $("#subFamiliaP").val();

        data = {
            transaccion: 'editar',
            clave_pastel,
            descripcion,
            precio,
            unidad_medida,
            familia,
            subfamilia 
        }

        $.post("../controller/ControllerListaProducto.php", data, (response) => {
            console.log(response);
            swal("Has actualizado los datos del pastel", `Clave pastel: ${clave_pastel}\nNombre: ${descripcion}`);            
        });             
    });

});

/**
 * Función que muestra todos los datos de un pastel en los campos correspondientes para
 * que posteriormente puedan ser editados 
 */
function consultarDatosPastel(clave_pastel)
{
    let datos = {
        transaccion: 'buscar',
        palabra: clave_pastel
    }

    $.post("../controller/ControllerListaProducto.php", datos, (response) => {
        console.log(response);
        var fila = $.parseJSON(response);//la variable fila contiene un arreglo de objetos 
        //console.log("Clave pastel: " + fila[0].clave_pastel);
        $("#claveP").val(fila[0].clave_pastel);//Accedemos a la posción 0 para obtener el único objeto que se encuentra en el arreglo
        
        $("#descripcionP").val(fila[0].descripcion);
        //Parseamos el atributo de precio en parte una entera y decimal
        let precioEntero = fila[0].precio.split(".")[0];
        let precioDecimal = fila[0].precio.split(".")[1];
        $("#precioP_entero").val(precioEntero);
        $("#precioP_decimal").val(precioDecimal);
        $("#unidad_medidaP").val(fila[0].unidad_medida);
        $("#familiaP").val(fila[0].familia);
        $("#subFamiliaP").val(fila[0].subfamilia);
        
    });
}