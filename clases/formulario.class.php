<?php

// include Database connection file 
include("./ajax/db_connection.php");


class formulario {

	public function listado_area(){
        global $con;
		$query = "SELECT * FROM areas";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        while($row = mysqli_fetch_assoc($result)){
            $arrayDatos[] = $row;
          }
		return  $arrayDatos;
	}

    public function listado_roles(){
        global $con;
		$query = "SELECT * FROM roles";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        while($row = mysqli_fetch_assoc($result)){
            $arrayDatos[] = $row;
          }
		return  $arrayDatos;
	}


}

?>