<?php

// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "prueba_tecnica_dev"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database, 3309);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>