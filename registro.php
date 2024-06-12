<?php
// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once 'conexion.php';

    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        // Manejar errores de preparación de la consulta
        $error_message = "Error de preparación de la consulta";
    } else {
        $stmt->bind_param("ss", $username, $hashed_password);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Registro exitoso, redirigir al inicio de sesión
            header("Location: ini.php");
            exit;
        } else {
            // Manejar errores de ejecución de la consulta
            $error_message = "Error al registrar el usuario";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>