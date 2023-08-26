<?php
$username = "root"; 
$password = ""; 
$dbname = "sisventas";

$conexion = mysqli_connect("localhost", $username, $password, $dbname);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
