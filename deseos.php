<?php
session_start();
$productos_deseados = $_SESSION['deseos'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Deseos | MediaShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #fff; color: #333; }
        .main-bar { background: #e0e0e0; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .icons i { margin-left: 20px; cursor: pointer; }
        .detalle { display: flex; gap: 40px; padding: 40px; flex-wrap: wrap; }
        .detalle img { width: 300px; border-radius: 10px; }
        .detalle h2 { margin: 0 0 10px; }
        .calidades label { margin-right: 10px; }
        .btn-carrito { margin-top: 15px; padding: 10px 20px; background: #6a0dad; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .corazon { font-size: 24px; color: gray; cursor: pointer; transition: 0.2s; }
        .corazon.activo { color: red; }
        .barra-audio {
            margin-top: 15px;
            width: 300px;
            height: 10px;
            background: #ddd;
            position: relative;
            border-radius: 5px;
        }
        .barra-audio::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            height: 100%;
            width: 30%;
            background: #6a0dad;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="main-bar">
    <h1>MediaShop</h1>
    <div class="icons">
        <i class="fas fa-search" onclick="location.href='tienda.php'"></i>
        <i class="fas fa-user" onclick="location.href='perfil.php'"></i>
        <i class="fas fa-heart" onclick="location.href='deseos.php'"></i>
        <i class="fas fa-shopping-cart" onclick="location.href='carrito.php'"></i>
        <i class="fas fa-download" onclick="location.href='descargas.php'"></i>
    </div>
</div>

<div class="detalle">
    <?php if (empty($productos_deseados)): ?>
        <p>No tienes productos en tu lista de deseos.</p>
    <?php else: ?>
        <?php foreach ($productos_deseados as $producto): ?>
            <div class="preview">
                <img src="<?= $producto['img'] ?>" alt="<?= $producto['nombre'] ?>">
                <h3><?= $producto['nombre'] ?></h3>
                <p>Precio: $10</p>
                <?php
                    $archivo_detalle = '';
                    if ($producto['tipo'] === 'audio') {
                        $archivo_detalle = 'detalle_audio.php';
                    } elseif ($producto['tipo'] === 'imagen') {
                        $archivo_detalle = 'detalle_imagen.php';
                    } elseif ($producto['tipo'] === 'video') {
                        $archivo_detalle = 'detalle_video.php';
                    }
                ?>
                <?php if ($archivo_detalle): ?>
                    <form method="POST" action="<?= $archivo_detalle ?>?id=<?= $producto['id'] ?>">
                        <button type="submit" class="btn-carrito">Ver detalles</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
