

<?php
session_start();

// Archivo: detalle_imagen.php
$id = $_GET['id'] ?? 0;
$tipo = 'imagen';

$imagenes = [
    ['tipo' => 'imagen', 'categoria' => 'NATURALEZA', 'id' => 101, 'nombre' => 'Montanas', 'img' => 'imagenes/categorias/imagenes/naturaleza/montanas.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'NATURALEZA', 'id' => 102, 'nombre' => 'Bosque', 'img' => 'imagenes/categorias/imagenes/naturaleza/bosque.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'NATURALEZA', 'id' => 103, 'nombre' => 'Desierto', 'img' => 'imagenes/categorias/imagenes/naturaleza/desierto.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'EDUCACION', 'id' => 104, 'nombre' => 'Colegio', 'img' => 'imagenes/categorias/imagenes/educacion/colegios.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'EDUCACION', 'id' => 105, 'nombre' => 'Profesor', 'img' => 'imagenes/categorias/imagenes/educacion/profesor.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'EDUCACION', 'id' => 106, 'nombre' => 'Libro', 'img' => 'imagenes/categorias/imagenes/educacion/libro.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'COMIDA Y BEBIDAS', 'id' => 107, 'nombre' => 'Gaseosa', 'img' => 'imagenes/categorias/imagenes/comidasybebidas/gaseosa.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'COMIDA Y BEBIDAS', 'id' => 108, 'nombre' => 'Lomo saltado', 'img' => 'imagenes/categorias/imagenes/comidasybebidas/lomos.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'COMIDA Y BEBIDAS', 'id' => 109, 'nombre' => 'Choripan', 'img' => 'imagenes/categorias/imagenes/comidasybebidas/choripan.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'DEPORTES', 'id' => 110, 'nombre' => 'Fútbol', 'img' => 'imagenes/categorias/imagenes/deportes/futbol.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'DEPORTES', 'id' => 111, 'nombre' => 'Natación', 'img' => 'imagenes/categorias/imagenes/deportes/natacion.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'DEPORTES', 'id' => 112, 'nombre' => 'Balonmano', 'img' => 'imagenes/categorias/imagenes/deportes/balonmano.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'ARQUITECTURA', 'id' => 113, 'nombre' => 'Templo antiguo', 'img' => 'imagenes/categorias/imagenes/arquitectura/temploantiguo.png'],
    ['tipo' => 'imagen', 'categoria' => 'ARQUITECTURA', 'id' => 114, 'nombre' => 'Gótico', 'img' => 'imagenes/categorias/imagenes/arquitectura/gotico.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'ARQUITECTURA', 'id' => 115, 'nombre' => 'Coliseo romano', 'img' => 'imagenes/categorias/imagenes/arquitectura/coliseor.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'CIENCIA Y MEDICINA', 'id' => 116, 'nombre' => 'Virus', 'img' => 'imagenes/categorias/imagenes/cienciaymedicina/virus.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'CIENCIA Y MEDICINA', 'id' => 117, 'nombre' => 'Inyección', 'img' => 'imagenes/categorias/imagenes/cienciaymedicina/inyeccion.jpg'],
    ['tipo' => 'imagen', 'categoria' => 'CIENCIA Y MEDICINA', 'id' => 118, 'nombre' => 'Doctor', 'img' => 'imagenes/categorias/imagenes/cienciaymedicina/doctor.jpg']
];

$producto = null;
foreach ($imagenes as $p) {
    if ($p['id'] == $id && $p['tipo'] == $tipo) {
        $producto = $p;
        break;
    }
}

if (!$producto) {
    echo "<script>alert('Producto no encontrado'); window.location='tienda.php';</script>";
    exit();
}

// Manejar lista de deseos
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
        <p>Precio: $5</p>
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
