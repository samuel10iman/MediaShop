<?php
// Archivo: detalle_audio.php
session_start();

$id = $_GET['id'] ?? 0;
$tipo = 'audio';

$productos_todos = [
    ['tipo' => 'audio', 'categoria' => 'CANCIONES', 'id' => 301, 'nombre' => 'Hysteria', 'img' => 'imagenes/categorias/audios/canciones/hysteria.jpg'],
    ['tipo' => 'audio', 'categoria' => 'CANCIONES', 'id' => 302, 'nombre' => 'Cuanto me duele', 'img' => 'imagenes/categorias/audios/canciones/morat.jpg'],
    ['tipo' => 'audio', 'categoria' => 'CANCIONES', 'id' => 303, 'nombre' => 'No me conoce', 'img' => 'imagenes/categorias/audios/canciones/nomecoonoce.jpg'],
    ['tipo' => 'audio', 'categoria' => 'EFECTOS', 'id' => 304, 'nombre' => 'Rebote', 'img' => 'imagenes/categorias/audios/efectos/rebote.jpg'],
    ['tipo' => 'audio', 'categoria' => 'EFECTOS', 'id' => 305, 'nombre' => 'Impacto', 'img' => 'imagenes/categorias/audios/efectos/impacto.jpg'],
    ['tipo' => 'audio', 'categoria' => 'EFECTOS', 'id' => 306, 'nombre' => 'Zumbido', 'img' => 'imagenes/categorias/audios/efectos/zumbido.jpg'],
    ['tipo' => 'audio', 'categoria' => 'GRITOS', 'id' => 307, 'nombre' => 'Grito de terror mujer', 'img' => 'imagenes/categorias/audios/gritos/gritomujer.jpg'],
    ['tipo' => 'audio', 'categoria' => 'GRITOS', 'id' => 308, 'nombre' => 'Grito de terror hombre', 'img' => 'imagenes/categorias/audios/gritos/gritohombre.jpg'],
    ['tipo' => 'audio', 'categoria' => 'GRITOS', 'id' => 309, 'nombre' => 'Grito hinchada', 'img' => 'imagenes/categorias/audios/gritos/hinchadaal.jpg'],
    ['tipo' => 'audio', 'categoria' => 'ANIMALES', 'id' => 310, 'nombre' => 'Pajaros cantando', 'img' => 'imagenes/categorias/audios/animales/pajaros.jpg'],
    ['tipo' => 'audio', 'categoria' => 'ANIMALES', 'id' => 311, 'nombre' => 'Gato maullando', 'img' => 'imagenes/categorias/audios/animales/gato.jpg'],
    ['tipo' => 'audio', 'categoria' => 'ANIMALES', 'id' => 312, 'nombre' => 'Castor comiendo', 'img' => 'imagenes/categorias/audios/animales/castor.jpg'],
    ['tipo' => 'audio', 'categoria' => 'VEHICULOS', 'id' => 313, 'nombre' => 'Mustang', 'img' => 'imagenes/categorias/audios/vehiculos/mustang.jpg'],
    ['tipo' => 'audio', 'categoria' => 'VEHICULOS', 'id' => 314, 'nombre' => 'Moto acuatica', 'img' => 'imagenes/categorias/audios/vehiculos/motoac.jpg'],
    ['tipo' => 'audio', 'categoria' => 'VEHICULOS', 'id' => 315, 'nombre' => 'Avion', 'img' => 'imagenes/categorias/audios/vehiculos/avion.jpg'],
    ['tipo' => 'audio', 'categoria' => 'HIMNOS', 'id' => 316, 'nombre' => 'Himno Peru', 'img' => 'imagenes/categorias/audios/himnos/peru.jpg'],
    ['tipo' => 'audio', 'categoria' => 'HIMNOS', 'id' => 317, 'nombre' => 'Himno Bolivia', 'img' => 'imagenes/categorias/audios/himnos/bolivia.jpg'],
    ['tipo' => 'audio', 'categoria' => 'HIMNOS', 'id' => 318, 'nombre' => 'Himno Mongolia', 'img' => 'imagenes/categorias/audios/himnos/mongolia.jpg']
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

// Añadir o quitar el producto de la lista de deseos
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
    <div class="preview">
        <img src="<?= $producto['img'] ?>" alt="<?= $producto['nombre'] ?>">
        <div class="barra-audio"></div>
    </div>
    <div>
        <p>ID: <?= $producto['id'] ?></p>
        <h2><?= $producto['nombre'] ?></h2>
        <form method="POST">
            <input type="hidden" name="action" value="<?= isset($_SESSION['deseos'][$producto['id']]) ? 'remove' : 'add' ?>">
            <button type="submit" class="corazon" style="font-size: 24px; color: <?= isset($_SESSION['deseos'][$producto['id']]) ? 'red' : 'gray' ?>;">
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
