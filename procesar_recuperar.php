<?php
include 'conexion.php';

$correo = $_POST['correo_recuperar'];

$sql = "SELECT * FROM usuario WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Simulamos que el correo fue enviado correctamente
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
        <div class="cerrar" onclick="window.location.href=\'login.html\'">&times;</div>
        <h2>Correo enviado</h2>
        <p>Revisa tu bandeja de entrada</p>
        <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Email enviado">
    </div>
    ';
} else {
    echo "<script>alert('El correo ingresado no está registrado'); window.history.back();</script>";
}

$stmt->close();
$conexion->close();
?>
