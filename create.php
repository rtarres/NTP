<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    

    $sql = "INSERT INTO clientes (nombre_cliente, direccion, telefono, correo) VALUES ('$nombre', '$direccion', '$telefono', '$correo')";

    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<html>
<body>

<head>
    <title>Crear Cliente</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
    <form method="post" action="">
        Nombre del Cliente: <input type="text" name="nombre"><br>
        Dirección: <input type="text" name="direccion"><br>
        Teléfono: <input type="text" name="telefono"><br>
        Correo Electrónico: <input type="text" name="correo"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
