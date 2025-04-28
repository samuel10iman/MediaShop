<?php
include('conexion.php'); // Conectar a la base de datos

// Obtener los datos del usuario logueado
session_start();
$id_user = $_SESSION['id_user']; // Suponiendo que el id del usuario se guarda en la sesión

$sql = "SELECT id_user, nombre, correo, numero, saldo, password FROM usuario WHERE id_user = '$id_user'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - MediaShop</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ffffff;
            color: #333;
        }

        .top-bar {
            background-color: #fff;
            color: #777;
            padding: 10px 0;
            text-align: center;
            font-size: 14px;
            display: flex;
            justify-content: space-around;
            border-bottom: 1px solid #ddd;
        }

        .main-bar {
            background-color: #e0e0e0;
            color: #333;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main-bar h1 {
            font-size: 28px;
        }

        .main-bar .icons {
            display: flex;
            gap: 20px;
        }

        .main-bar .icons i {
            font-size: 20px;
            cursor: pointer;
        }

        /* Formulario de perfil */
        .perfil-container {
            padding: 40px;
            text-align: center;
        }

        .perfil-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .perfil-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            width: 60%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .perfil-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .perfil-form input[type="password"] {
            font-size: 16px;
        }

        .perfil-form button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .perfil-form button:hover {
            background-color: #45a049;
        }

        .footer {
            background-color: #e0e0e0;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            color: #333;
        }

        .footer-section {
            margin: 20px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
        }

        .footer-section i {
            margin-right: 8px;
        }

        .copy-bar {
            background-color: #111;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- Barra blanca -->
<div class="top-bar">
    <span>Entrega a tiempo garantizada</span>
    <span>Atención ágil y eficiente</span>
    <span>100% original</span>
    <span>De confianza</span>
</div>

<!-- Barra gris/plateada -->
<div class="main-bar">
    <h1>MediaShop</h1>
    <div class="icons">
        <i class="fas fa-search" onclick="window.location='tienda.php'"></i>
        <i class="fas fa-user" onclick="window.location='perfil.php'"></i>
        <i class="fas fa-heart" onclick="window.location='deseos.php'"></i>
        <i class="fas fa-shopping-cart" onclick="window.location='carrito.php'"></i>
        <i class="fas fa-download" onclick="window.location='descargas.php'"></i>
    </div>
</div>

<!-- Formulario de perfil -->
<div class="perfil-container">
    <h2>Mi Perfil</h2>
    <form class="perfil-form" action="actualizar_perfil.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $usuario['nombre']; ?>" required>
        <input type="email" name="correo" placeholder="Correo electrónico" value="<?php echo $usuario['correo']; ?>" required>
        <input type="text" name="numero" placeholder="Número de celular" value="<?php echo $usuario['numero']; ?>" required>
        <input type="password" name="password" placeholder="Contraseña" value="<?php echo $usuario['password']; ?>" required>
        <input type="text" name="saldo" value="Saldo: <?php echo $usuario['saldo']; ?>" disabled>
        <div>
            <button type="submit" name="guardar">Guardar cambios</button>
            <button type="button" onclick="window.location='cargar_saldo.php'">Cargar saldo</button>
            <button type="button" onclick="window.location='borrar_cuenta.php'">Borrar cuenta</button>
        </div>
    </form>
</div>

<!-- Footer -->
<div class="footer">
    <div class="footer-section">
        <h4>MediaShop</h4>
        <div>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
        </div>
    </div>
    <div class="footer-section">
        <h4>Métodos de pago</h4>
        <div><i class="fab fa-cc-visa"></i> Visa</div>
        <div><i class="fab fa-cc-mastercard"></i> Mastercard</div>
        <div><i class="fas fa-mobile-alt"></i> Yape</div>
        <div><i class="fab fa-cc-amex"></i> American Express</div>
    </div>
    <div class="footer-section">
        <h4>Ayuda</h4>
        <div>Servicio al Cliente</div>
        <div>Preguntas Frecuentes</div>
        <div>Términos y Condiciones</div>
    </div>
    <div class="footer-section">
        <h4>Sobre nosotros</h4>
        <div>MediaShop.com</div>
    </div>
    <div class="footer-section">
        <h4>Contáctanos</h4>
        <div><i class="fas fa-phone"></i> +51 999-999-999</div>
        <div><i class="fas fa-envelope"></i> mediashop@gmail.com</div>
    </div>
</div>

<!-- Copy -->
<div class="copy-bar">
    © 2025 MediaShop - Todos los derechos reservados
</div>

</body>
</html>
