<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Nombre.</th>
							<th>Email</th>
							<th>Sexo</th>
							<th>Area</th>
							<th>Boletin</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>';

	$query = "SELECT e.id, e.nombre, e.email, e.sexo,  a.nombre AS area, e.boletin
	FROM empleado AS e
	INNER JOIN areas AS a ON(e.area_id=a.id)";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['nombre'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['sexo'].'</td>
				<td>'.$row['area'].'</td>
				<td>'.$row['boletin'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning"><i class="fas fa-edit"></i></button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>