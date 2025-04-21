<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - MediaShop</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            margin: 0;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('fondo.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        header {
            background: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }
        .login-container {
            width: 400px;
            background: white;
            padding: 40px;
            margin: 100px auto;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        .tabs {
            text-align: center;
            margin-bottom: 30px;
        }
        .tabs span {
            margin: 0 15px;
            cursor: default;
            font-weight: bold;
            color: #5a2ca0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #5a2ca0;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<header>
    MediaShop
</header>

<div class="login-container">
    <div class="tabs">
        <span>Login Admin</span>
    </div>
    <form action="procesar_login_admin.php" method="POST">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
