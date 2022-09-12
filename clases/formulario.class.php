<?php

// include Database connection file 
include("./ajax/db_connection.php");


class formulario {

	// public $arreglo_matriz = array(
	// 	"0" => array(
	// 		"0" => "1",
	// 		"1" => "2",
	// 		"2" => "3"
	// 	),

	// 	"1" => array(
	// 		"0" => "4",
	// 		"1" => "5",
	// 		"2" => "6"
	// 	),

	// 	"2" => array(
	// 		"0" => "9",
	// 		"1" => "8",
	// 		"2" => "9"
	// 	)

	// );


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