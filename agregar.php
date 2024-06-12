<?php
// Conexión a la base de datos (cambia las credenciales según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];

// Preparar la consulta SQL de inserción
$sql = "INSERT INTO productos (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagen')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado correctamente.";
} else {
    echo "Error al agregar el producto: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>