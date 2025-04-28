<?php
session_start();
include 'conexion.php'; // Tu conexión a la base de datos

// Obtenemos el tipo por GET
$tipo = $_GET['tipo'] ?? 'imagen'; // Valor por defecto: imagen

// Título según tipo
$titulo = '';

switch ($tipo) {
    case 'video':
        $titulo = 'Categorías de Video';
        break;
    case 'imagen':
        $titulo = 'Categorías de Imagen';
        break;
    case 'audio':
        $titulo = 'Categorías de Audio';
        break;
    default:
        $titulo = 'Categorías';
}

// Ahora, traemos las categorías de la base de datos según el tipo
$categorias = [];
$stmt = $conexion->prepare("SELECT id_categoria, nombre, ruta_img FROM categoria WHERE tipo_prod = ?");
$stmt->bind_param("s", $tipo);
$stmt->execute();
$resultado = $stmt->get_result();

while ($row = $resultado->fetch_assoc()) {
    $categorias[] = $row;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?> | MediaShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Estilos igual que tu plantilla */
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

        .seccion-productos {
            padding: 40px;
        }

        .seccion-productos h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .productos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 20px;
        }

        .producto {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .producto:hover {
            transform: scale(1.03);
        }

        .producto img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>

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

<!-- Categorías -->
<div class="seccion-productos">
    <h3><?= htmlspecialchars($titulo) ?></h3>
    <div class="productos">
        <?php foreach ($categorias as $cat): ?>
            <button class="producto" onclick="location.href='productos.php?tipo=<?= urlencode($tipo) ?>&id_categoria=<?= urlencode($cat['id_categoria']) ?>'">
                <img src="<?= htmlspecialchars($cat['ruta_img']) ?>" alt="<?= htmlspecialchars($cat['nombre']) ?>">
                <p><?= htmlspecialchars($cat['nombre']) ?></p>
            </button>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
