// Add Record
function addRecord() {

    // get values
    var id = $("#hidden_user_id").val();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var sexo = $('input:radio[name=sexo]:checked').val();
    var area = $("#area").val();
    var descripcion = $("#descripcion").val();
    var boletin = $("#boletin").val();
    var roles = $("#roles").val();

    $.ajax({
        type: 'POST', // Envío con método POST
        url: 'ajax/addRecord.php', // Fichero destino (el PHP que trata los datos)
        data: { nombre: nombre, email: email, sexo: sexo, area: area, descripcion: descripcion, boletin: boletin, roles: roles, id: id } // Datos que se envían
    }).done(function(msg) { // Función que se ejecuta si todo ha ido bien
        alert(msg);
        $("#add_new_record_modal").modal("hide");
        // read records again
        readRecords();
        // clear fields from the popup
        $("#nombre").val("");
        $("#email").val("");
        $("#sexo").val("");
        $("#area").val("");
        $("#descripcion").val("");
        $("#boletin").val("");
        $("#roles").val("");

    }).fail(function(jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
        // Mostramos en consola el mensaje con el error que se ha producido
        if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
        } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
        } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
        } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
        } else if (textStatus === 'timeout') {
            alert('Time out error.');
        } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
        } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
        }
    });
}

// READ records
function readRecords() {

    $.ajax({
        type: 'GET', // Envío con método POST
        url: 'ajax/readRecord.php', // Fichero destino (el PHP que trata los datos)
    }).done(function(msg) { // Función que se ejecuta si todo ha ido bien
        $("#records_content").html(msg);

    }).fail(function(jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
        // Mostramos en consola el mensaje con el error que se ha producido
        if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
        } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
        } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
        } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
        } else if (textStatus === 'timeout') {
            alert('Time out error.');
        } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
        } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
        }
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.ajax({
            type: 'POST', // Envío con método POST
            url: 'ajax/deleteUser.php', // Fichero destino (el PHP que trata los datos)
            data: { id: id } // Datos que se envían
        }).done(function(msg) { // Función que se ejecuta si todo ha ido bien
            readRecords();

        }).fail(function(jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
            if (jqXHR.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + jqXHR.responseText);
            }
        });
    }

}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage

    $("#hidden_user_id").val(id);

    $.ajax({
        type: 'POST', // Envío con método POST
        url: 'ajax/readUserDetails.php', // Fichero destino (el PHP que trata los datos)
        data: { id: id } // Datos que se envían
    }).done(function(msg) { // Función que se ejecuta si todo ha ido bien
        // PARSE json data
        var user = JSON.parse(msg);
        // Assing existing values to the modal popup fields
        $("#nombre").val(user.nombre);
        $("#email").val(user.email);
        $("#area").val(user.area_id);
        $("#boletin").val(user.boletin);
        $("#descripcion").val(user.descripcion);

        if (user.sexo == 'M') $("#M").attr("checked", true);
        else if (user.sexo == 'F') $("#F").attr("checked", true);

        if (user.boletin == '1') $("#boletin").prop("checked", true);
        else if (user.boletin == '2') $("#boletin").prop("checked", false);

        $("#rol ").prop("checked", true);

    }).fail(function(jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
        // Mostramos en consola el mensaje con el error que se ha producido
        if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
        } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
        } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
        } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
        } else if (textStatus === 'timeout') {
            alert('Time out error.');
        } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
        } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
        }
    });

    // Open modal popup
    $("#add_new_record_modal").modal("show");
}

$(document).ready(function() {
    // READ recods on page load
    readRecords(); // calling function
});