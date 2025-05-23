<?php
session_start();
include 'conexion.php'; // Tu conexión a la base de datos

// Obtener tipo y categoría desde GET
$tipo = $_GET['tipo'] ?? 'imagen';
$id_categoria = $_GET['id_categoria'] ?? 0; // Recibimos el id_categoria

$nombre_categoria = '';
if ($id_categoria > 0) {
    $stmt = $conexion->prepare("SELECT nombre FROM categoria WHERE id_categoria = ?");
    $stmt->bind_param("i", $id_categoria);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($row = $resultado->fetch_assoc()) {
        $nombre_categoria = $row['nombre'];
    }
    $stmt->close();
}

// Cargamos los productos que coinciden con tipo y categoría
$productos = [];
if ($id_categoria > 0) {
    $stmt = $conexion->prepare("SELECT * FROM producto WHERE tipo_prod = ? AND id_categoria = ?");
    $stmt->bind_param("si", $tipo, $id_categoria); // Asegúrate de que id_categoria sea un entero
    $stmt->execute();
    $resultado = $stmt->get_result();
    while ($row = $resultado->fetch_assoc()) {
        $productos[] = $row;
    }
    $stmt->close();
}

if (empty($productos)) {
    echo "<p>No hay productos disponibles en esta categoría.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?> | MediaShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Mismos estilos para mantener coherencia */
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

<!-- Productos -->
<div class="seccion-productos">
    <h3>Productos de la categoría: <?= htmlspecialchars($nombre_categoria) ?></h3>
    <div class="productos">
        <?php foreach ($productos as $prod): ?>
            <?php
            // Definimos a qué detalle ir según el tipo
            $paginaDetalle = '';
            if ($tipo === 'audio') {
                $paginaDetalle = 'detalle_audio.php';
            } elseif ($tipo === 'video') {
                $paginaDetalle = 'detalle_video.php';
            } else {
                $paginaDetalle = 'detalle_imagen.php';
            }
            ?>
            <button class="producto" onclick="location.href='<?= $paginaDetalle ?>?id=<?= urlencode($prod['id_prod']) ?>'">
                <img src="<?= htmlspecialchars($prod['ruta_preview']) ?>" alt="<?= htmlspecialchars($prod['nombre_prod']) ?>">
                <p><?= htmlspecialchars($prod['nombre_prod']) ?></p>
            </button>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
