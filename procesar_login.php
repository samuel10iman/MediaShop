<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpieza básica para evitar espacios invisibles
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);

    // Preparar consulta
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Comparación directa (sin hash)
        if ($usuario["password"] === $password) {
            $_SESSION["id_user"] = $usuario["id_user"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["correo"] = $usuario["correo"];
            $_SESSION["admin"] = $usuario["admin"];

            // Redirección según rol
            if ($usuario["admin"] == 1) {
                header("Location: bienvenida_admin.php");
                exit();
            } else {
                header("Location: tienda.php");
                exit();
            }
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href='index.php';</script>";
    }

    $stmt->close();
    $conexion->close();
}
?>
