<?php
#conexion a la base de datos 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "confeccion";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
};

?>