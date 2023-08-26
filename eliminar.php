<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $sql = "DELETE FROM clientes WHERE id = '$id'";
    
    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al ejecutar la sentencia de eliminación: " . mysqli_error($conexion);
    }
} else {
    echo "No se proporcionó un ID válido para eliminar.";
}
?>
