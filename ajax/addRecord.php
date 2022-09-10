<?php

if(isset($_POST['nombre']))
	{
	
		// include Database connection file 
		include("db_connection.php");

		// get values 
 
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
    $sexo=$_POST['sexo'];
    $area=$_POST['area'];
    $descripcion=$_POST['descripcion'];
    $boletin=$_POST['boletin'];
    $roles=$_POST['roles'];


		$query = "INSERT INTO empleado(nombre, email, sexo, area_id, descripcion, boletin) VALUES('$nombre', '$email', '$sexo', '$area', '$descripcion', '$boletin')";

		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }


	    echo "1 Record Added!";
	}
?>