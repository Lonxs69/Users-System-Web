<?php
$host = 'localhost';
$dbname = 'login_system';
$username = 'root'; // Cambia si usas otro usuario en XAMPP
$password = ''; // Cambia si tienes una contraseña configurada

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>