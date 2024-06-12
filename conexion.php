<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "registro";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para encriptar contraseñas
function encriptarContraseña($contraseña) {
    // Utiliza el algoritmo de hash bcrypt para encriptar la contraseña
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    return $hash;
}
?>