<?php

if(isset($_POST['nombre'])){
	
	// include Database connection file 
	include("db_connection.php");

		// get values 
	$user_id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
    $sexo=$_POST['sexo'];
    $area=$_POST['area'];
    $descripcion=$_POST['descripcion'];
    $boletin=$_POST['boletin'];
    //$roles=$_POST['roles'];

	if($user_id!=''){
			$query2 = "UPDATE empleado SET nombre='$nombre', email='$email', sexo='$sexo',  area_id='$area', descripcion = '$descripcion', boletin = '$boletin' WHERE id = '$user_id'";
			if (!$result2 = mysqli_query($con, $query2)) {
				exit(mysqli_error($con));
			}
			echo "Se actualizo el rgistro correctamente!";
		
	}else{
		$query4 = "INSERT INTO empleado(nombre, email, sexo, area_id, descripcion, boletin) VALUES('$nombre', '$email', '$sexo', '$area', '$descripcion', '$boletin')";
		if (!$result4 = mysqli_query($con, $query4)) {
			exit(mysqli_error($con));
		}
		echo "Se guardo el registro correctamente!";
	}
}
?>