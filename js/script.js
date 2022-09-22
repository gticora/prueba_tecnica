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

    // Add record
    $.post("ajax/addRecord.php", {
        nombre: nombre,
        email: email,
        sexo: sexo,
        area: area,
        descripcion: descripcion,
        boletin: boletin,
        roles: roles,
        id: id
    }, function(data, status) {
        console.log(data);
        // close the popup
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
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function(data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function(data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage

    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#nombre").val(user.nombre);
            $("#email").val(user.email);
            $("#area").val(user.area_id);
            $("#boletin").val(user.boletin);
            //$("#descripcion").val(user.descripcion);

            if (user.sexo == 'M') $("#M").attr("checked", true);
            else if (user.sexo == 'F') $("#F").attr("checked", true);

            if (user.boletin == '1') $("#boletin").prop("checked", true);
            else if (user.boletin == '2') $("#boletin").prop("checked", false);

            $("#rol ").prop("checked", true);
        }
    );
    // Open modal popup
    $("#add_new_record_modal").modal("show");
}

$(document).ready(function() {
    // READ recods on page load
    readRecords(); // calling function
});