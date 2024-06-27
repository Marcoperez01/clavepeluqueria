<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = getenv("sql108.infinityfree.com");
$username = getenv("if0_36742153");
$password = getenv("vnuE6w78os0J");
$dbname = getenv("if0_36742153_peluqueria");
echo "Servidor: " . (empty($servername) ? 'Vacio' : $servername) . "<br>";
echo "Usuario: " . (empty($username) ? 'Vacio' : $username) . "<br>";
echo "Contraseña: " . (empty($password) ? 'Vacio' : $password) . "<br>";
echo "Base de datos: " . (empty($dbname) ? 'Vacio' : $dbname) . "<br>";
if (empty($servername) || empty($username) || empty($password) || empty($dbname)) {
    die("Uno o más parámetros de conexión están vacíos. Verifica tus credenciales.");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
// Obtener la cédula del formulario
$cedula = $_POST['cedula'];
// Preparar la consulta
$stmt = $conn->prepare("SELECT nombre, apellido, direccion, cedula, numero, edad
FROM Crearsesion WHERE cedula = ?");
$stmt->bind_param("i", $cedula);
// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();
// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
 // Mostrar los datos
 while ($row = $result->fetch_assoc()) {
 echo "Nombre: " . $row['nombre'] . "<br>";
 echo "Apellido: " . $row['apellido'] . "<br>";
 echo "Dirección: " . $row['direccion'] . "<br>";
 echo "Cédula: " . $row['cedula'] . "<br>";
 echo "Número: " . $row['numero'] . "<br>";
 echo "Edad: " . $row['edad'] . "<br>";
 }
} else {
 echo "No se encontraron resultados para la cédula ingresada.";
}
// Cerrar la conexión
$stmt->close();
$conn->close();
?>