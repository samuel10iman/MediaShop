<?php
include 'conexion.php';

// Validar que los campos estén llenos
if (
    empty($_POST['nombre']) ||
    empty($_POST['correo']) ||
    empty($_POST['numero']) ||
    empty($_POST['password']) ||
    !isset($_POST['terminos'])
) {
    echo "<script>alert('Por favor, complete todos los campos y acepte los términos.'); window.history.back();</script>";
    exit;
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$numero = $_POST['numero'];
$password = $_POST['password'];
$novedad = isset($_POST['novedad']) ? 1 : 0; // si marcó recibir novedades

// Preparar SQL para insertar nuevo usuario
$sql = "INSERT INTO usuario (nombre, correo, numero, password, novedad, saldo, admin, tipo_cli) 
        VALUES (?, ?, ?, ?, ?, 0, 0, 'cliente')";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssi", $nombre, $correo, $numero, $password, $novedad);

if ($stmt->execute()) {
    // Mostrar alerta personalizada con fondo oscuro (como dijiste)
    echo '
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal {
            width: 300px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .modal img {
            width: 60px;
            margin-top: 15px;
        }
        .cerrar {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
    <div class="modal">
        <div class="cerrar" onclick="window.location.href=\'index.php\'">&times;</div>
        <h2>¡Registro completo!</h2>
        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Check">
    </div>
    ';
} else {
    echo "<script>alert('Error al registrar el usuario'); window.history.back();</script>";
}

$stmt->close();
$conexion->close();
?>
