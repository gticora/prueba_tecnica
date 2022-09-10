<?php
if(isset($_POST['TipoDocu']) && isset($_POST['NumeUsua']))
	{

		// include Database connection file 
		include("db_connection.php");

		// get values 
 
	$TipoDocu=$_POST['TipoDocu'];
	$NumeUsua=$_POST['NumeUsua'];
    $Nombre1=$_POST['Nombre1'];
    $Nombre2=$_POST['Nombre2'];
    $Apellido1=$_POST['Apellido1'];
    $Apellido2=$_POST['Apellido2'];
    $Genero=$_POST['Genero'];
    $IdDepa=$_POST['IdDepa'];
    $IdMuni=$_POST['IdMuni'];

		$query = "INSERT INTO paciente(TipoDocu, NumeUsua, Nombre1, Nombre2, Apellido1, Apellido2, Genero, IdDepa, IdMuni) VALUES('$TipoDocu', '$NumeUsua', '$Nombre1', '$Nombre2', '$Apellido1', '$Apellido2', '$Genero', '$IdDepa', 'IdMuni' )";

		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }


	    echo "1 Record Added!";
	}
?>