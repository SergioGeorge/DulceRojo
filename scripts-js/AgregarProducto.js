$(document).ready(function () {
    $('form').submit(e => {
        e.preventDefault();
        const data = {
          claveP: $('#ClaveP').val(),
          nombreP: $('#NombreP').val(),
          precioP: $('#PrecioP').val(),
          familia: $('#FamiliaP').val(),
          subfamilia: $('#SubFamiliaP').val()
        };
        // const url = edit === false ? 'task-add.php' : 'task-edit.php';
        console.log(data);
        $.post(postData, (response) => {
          console.log(response);
          $('#task-form').trigger('reset');
        });
      });
});


