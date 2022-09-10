<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $TipoDocu=$_POST['TipoDocu'];
    $NumeUsua=$_POST['NumeUsua'];
    $Nombre1=$_POST['Nombre1'];
    $Nombre2=$_POST['Nombre2'];
    $Apellido1=$_POST['Apellido1'];
    $Apellido2=$_POST['Apellido2'];
    $Genero=$_POST['Genero'];
    $IdDepa=$_POST['IdDepa'];
    $IdMuni=$_POST[' IdMuni'];
        //$departamento = $_POST['CodiDepa'];
        //$municipio = $_POST['CodiMuni'];
 
    

    // Updaste User details
    $query = "UPDATE paciente SET TipoDocu='$TipoDocu', NumeUsua='$NumeUsua', Nombre1='$Nombre1',  Nombre2='$Nombre2', Apellido1 = '$Apellido1', Apellido2 = '$Apellido2', Genero='$Genero', IdDepa = '$IdDepa' , IdMuni = '$IdMuni' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}