<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "UPDATE clientes SET nombre_cliente='$nombre', direccion='$direccion', telefono='$telefono', correo='$correo' WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id=$id";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<html>

<head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nombre del Cliente: <input type="text" name="nombre" value="<?php echo $row['nombre_cliente']; ?>"><br>
        Dirección: <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>"><br>
        Teléfono: <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"><br>
        Correo Electrónico: <input type="text" name="correo" value="<?php echo $row['correo']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
