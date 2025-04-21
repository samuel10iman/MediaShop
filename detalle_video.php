<?php
// Archivo: detalle_video.php
session_start();

$id = $_GET['id'] ?? 0;
$tipo = 'video';

$productos_todos = [
    ['tipo' => 'video', 'categoria' => 'ANIMALES', 'id' => 201, 'nombre' => 'Perro aullando', 'img' => 'imagenes/categorias/videos/animales/perroaullando.jpg'],
    ['tipo' => 'video', 'categoria' => 'ANIMALES', 'id' => 202, 'nombre' => 'Vida marina', 'img' => 'imagenes/categorias/videos/animales/vidamarina.jpg'],
    ['tipo' => 'video', 'categoria' => 'ANIMALES', 'id' => 203, 'nombre' => 'Focas felices', 'img' => 'imagenes/categorias/videos/animales/focasfelices.jpg'],
    ['tipo' => 'video', 'categoria' => 'PERSONAS', 'id' => 204, 'nombre' => 'Celbracion de gol', 'img' => 'imagenes/categorias/videos/personas/gol.jpg'],
    ['tipo' => 'video', 'categoria' => 'PERSONAS', 'id' => 205, 'nombre' => 'Hombre bailando', 'img' => 'imagenes/categorias/videos/personas/bailando.jpg'],
    ['tipo' => 'video', 'categoria' => 'PERSONAS', 'id' => 206, 'nombre' => 'Mujer cocinando', 'img' => 'imagenes/categorias/videos/personas/cocinando.jpg'],
    ['tipo' => 'video', 'categoria' => 'DEPORTES', 'id' => 207, 'nombre' => 'Partido de basquet', 'img' => 'imagenes/categorias/videos/deportes/basquet.jpg'],
    ['tipo' => 'video', 'categoria' => 'DEPORTES', 'id' => 208, 'nombre' => 'Boxeadores', 'img' => 'imagenes/categorias/videos/deportes/box.jpg'],
    ['tipo' => 'video', 'categoria' => 'DEPORTES', 'id' => 209, 'nombre' => 'Tenistas', 'img' => 'imagenes/categorias/videos/deportes/tennis.jpg'],
    ['tipo' => 'video', 'categoria' => 'INFANTILES', 'id' => 210, 'nombre' => 'Pocoyo Corto', 'img' => 'imagenes/categorias/videos/infantiles/pocoyo.jpg'],
    ['tipo' => 'video', 'categoria' => 'INFANTILES', 'id' => 211, 'nombre' => 'Tom y Jerry', 'img' => 'imagenes/categorias/videos/infantiles/tomyjerry.jpg'],
    ['tipo' => 'video', 'categoria' => 'INFANTILES', 'id' => 212, 'nombre' => 'Paw Patrol', 'img' => 'imagenes/categorias/videos/infantiles/pawpatrol.jpg'],
    ['tipo' => 'video', 'categoria' => 'MOTIVACIONALES', 'id' => 213, 'nombre' => 'Ibai motivacion', 'img' => 'imagenes/categorias/videos/motivacionales/ibai.jpg'],
    ['tipo' => 'video', 'categoria' => 'MOTIVACIONALES', 'id' => 214, 'nombre' => 'Llados', 'img' => 'imagenes/categorias/videos/motivacionales/llados.jpg'],
    ['tipo' => 'video', 'categoria' => 'MOTIVACIONALES', 'id' => 215, 'nombre' => 'Conferencia', 'img' => 'imagenes/categorias/videos/motivacionales/conferencia.jpg'],
    ['tipo' => 'video', 'categoria' => 'CIUDADES', 'id' => 216, 'nombre' => 'Lima', 'img' => 'imagenes/categorias/videos/ciudades/lima.jpg'],
    ['tipo' => 'video', 'categoria' => 'CIUDADES', 'id' => 217, 'nombre' => 'Moscu', 'img' => 'imagenes/categorias/videos/ciudades/moscu.jpg'],
    ['tipo' => 'video', 'categoria' => 'CIUDADES', 'id' => 218, 'nombre' => 'Barcelona', 'img' => 'imagenes/categorias/videos/ciudades/barcelona.jpg']
];

$producto = null;
foreach ($productos_todos as $p) {
    if ($p['id'] == $id && $p['tipo'] == $tipo) {
        $producto = $p;
        break;
    }
}

if (!$producto) {
    echo "<script>alert('Producto no encontrado'); window.location='tienda.php';</script>";
    exit();
}

// Manejo de deseos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        $_SESSION['deseos'][$producto['id']] = $producto;
    } elseif ($_POST['action'] === 'remove') {
        unset($_SESSION['deseos'][$producto['id']]);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $producto['nombre'] ?> | MediaShop</title>
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
        .video-preview {
            position: relative;
            width: 300px;
        }
        .video-preview::before {
            content: "\f04b";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: white;
            text-shadow: 0 0 10px black;
            pointer-events: none;
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
    <div class="video-preview">
        <img src="<?= $producto['img'] ?>" alt="<?= $producto['nombre'] ?>">
    </div>
    <div>
        <p>ID: <?= $producto['id'] ?></p>
        <h2><?= $producto['nombre'] ?></h2>
        <form method="POST">
            <input type="hidden" name="action" value="<?= isset($_SESSION['deseos'][$producto['id']]) ? 'remove' : 'add' ?>">
            <button type="submit" class="corazon" style="color: <?= isset($_SESSION['deseos'][$producto['id']]) ? 'red' : 'gray' ?>;">
                <i class="fas fa-heart"></i>
            </button>
        </form>
        <p>Precio: $10</p>
        <div class="calidades">
            <label><input type="radio" name="calidad"> Web</label>
            <label><input type="radio" name="calidad"> HD</label>
            <label><input type="radio" name="calidad"> 4K</label>
        </div>
        <button class="btn-carrito">Añadir al carrito</button>
    </div>
</div>

</body>
</html>
