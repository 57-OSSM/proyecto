<?php
session_start();

if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && (time()- $_SESSION['ULTIMA_ACTIVIDAD'] > 1800)){
    session_unset();
    session_destroy();
    echo "<scrip> alert(Su sesion ha expirado por inanctividad); window.location = '../public/auth/login.php';
    </scrip>";
    exit();
}
$_SESSION['ULTIMA_ACTIVIDAD'] = time();
?>