<?php
include 'conexion.php';

$sql = "SELECT * FROM clientes";
$result = mysqli_query($conexion, $sql);
?>

<html>

<head>
    <title>CRUD de Clientes</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
<br>
<a href="create.php" class="agregar-link">Agregar Cliente</a><br><br>

    <table class="cliente-table">
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre_cliente']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="editar-link" >Editar</a>
                    <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="eliminar-link">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table><br><br>

    <a href="reporte.php" target="blank" class="generar-link">Generar Reporte</a>
    

    <script>
        $(document).ready(function() {
            
            $(".cliente-table tr:even").addClass("even");
            $(".cliente-table tr:odd").addClass("odd");

            $(".cliente-table tr").hover(
                function() {
                    $(this).addClass("highlight");
                },
                function() {
                    $(this).removeClass("highlight");
                }
            );
        });
    </script>
</body>
</html>
