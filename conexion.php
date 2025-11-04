<?php
$servidor = "localhost";   // o 127.0.0.1
$usuario = "root";         // tu usuario de phpMyAdmin
$contrasena = "";          // tu contraseña (vacía por defecto en XAMPP)
$base_datos = "clinica"; // nombre de tu base de datos

// Conectarse
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Establecer el charset (opcional pero recomendado)
mysqli_set_charset($conexion, "utf8");
?>
