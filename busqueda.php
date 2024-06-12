<?php
// Conexión a la base de datos (cambia las credenciales según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el término de búsqueda del formulario
$searchTerm = $_GET['query'];

// Consulta SQL para buscar productos que coincidan con el término de búsqueda
$sql = "SELECT * FROM productos WHERE nombre LIKE '%$searchTerm%' OR descripcion LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Mostrar los resultados
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['nombre'] . "</h2>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<img src='" . $row['imagen'] . "' alt='" . $row['nombre'] . "'><br><br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>