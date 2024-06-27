<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = getenv("sql108.infinityfree.com");
$username = getenv("if0_36742153");
$password = getenv("Ma3006774156.");
$dbname = getenv("if0_36742153_peluqueria");
if (empty($servername) || empty($username) || empty($password) || empty($dbname)) {
    die("Uno o más parámetros de conexión están vacíos. Verifica tus credenciales.");
}
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$cedula = $_POST['cedula'];
$numero = $_POST['numero'];
$edad = $_POST['edad'];
// Insertar los datos en la base de datos
$sql = "INSERT INTO Crearsesion (nombre, apellido, direccion, cedula, numero, edad)
VALUES ('$nombre', '$apellido', '$direccion', '$cedula', '$numero', '$edad')";

if ($conn->query($sql) === TRUE) {
 echo "Pedido realizado con éxito";
 echo $direccion;
 echo $cedula;
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}
// Cerrar la conexión
$conn->close();
?>