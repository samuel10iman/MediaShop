<?php
include 'conexion.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuario WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    if ($usuario['password'] == $contrasena && $usuario['admin'] == 1) {
        echo "<h1 style='text-align: center; font-family: Arial;'>Bienvenido a MediaShop Admin</h1>";
    } else {
        echo "<h1 style='text-align: center; font-family: Arial; color: red;'>Admin no encontrado</h1>";
    }
} else {
    echo "<h1 style='text-align: center; font-family: Arial; color: red;'>Admin no encontrado</h1>";
}

$stmt->close();
$conexion->close();
?>
