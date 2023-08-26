<?php
// Incluye la clase FPDF
require('fpdf186/fpdf.php');

// Crea una instancia de la clase PDF
$pdf = new FPDF();
$pdf->AddPage();

// Configura la fuente y el tamaño del texto con Times
$pdf->SetFont('Times', '', 12);

// Establece la codificación a UTF-8
$pdf->SetFont('Times', '', 12);
$pdf->SetTextColor(0, 0, 0);

// Conecta a la base de datos (Reemplaza con tus propios datos de conexión)
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sisventas";

$conexion = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener los datos de tu CRUD (Reemplaza con tu propia consulta)
$query = "SELECT * FROM clientes";
$resultado = mysqli_query($conexion, $query);

// Crea una instancia de la clase FPDF con codificación UTF-8
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Times', 'B', 12);
        $this->Cell(40, 10, utf8_decode('INFORME DE CLIENTES'), 0, 1, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

// Loop para agregar datos al PDF
while ($fila = mysqli_fetch_assoc($resultado)) {
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(40, 10, 'ID: ' . utf8_decode($fila['id']), 0, 1);
    $pdf->Cell(40, 10, 'NOMBRE: ' . utf8_decode($fila['nombre_cliente']), 0, 1);
    $pdf->Cell(40, 10, 'DIRECCION: ' . utf8_decode($fila['direccion']), 0, 1);
    $pdf->Cell(40, 10, 'TELEFONO: ' . utf8_decode($fila['telefono']), 0, 1);
    $pdf->Cell(40, 10, 'CORREO ELECTRONIC0: ' . utf8_decode($fila['correo']), 0, 1);
    $pdf->Ln(10); // Salto de línea para separar registros
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);

// Genera el archivo PDF
$pdf->Output();
?>
