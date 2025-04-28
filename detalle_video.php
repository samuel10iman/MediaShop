
<?php
session_start();
include 'conexion.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    // Realizar la consulta a la base de datos
    $consulta = $conexion->prepare("SELECT * FROM producto WHERE id_prod = ? AND tipo_prod = 'video'");
    $consulta->bind_param('i', $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
        $nombre = htmlspecialchars($producto['descripcion']);
        $descripcion = htmlspecialchars($producto['descripcion']);
        $precio = htmlspecialchars($producto['precio']);
        $ruta = htmlspecialchars($producto['ruta_archivo']); // archivo real (imagen grande)
        $id_prod = $producto['id_prod'];
    } else {
        echo "<script>alert('Producto no encontrado'); window.location='tienda.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID no válido'); window.location='tienda.php';</script>";
    exit();
}

// Manejar lista de deseos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        $_SESSION['deseos'][$id_prod] = $producto;
    } elseif ($_POST['action'] === 'remove') {
        unset($_SESSION['deseos'][$id_prod]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $nombre ?> | MediaShop</title>
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
        <img src="<?= $ruta ?>" alt="<?= $nombre ?>">
    </div>
    <div>
        <p>ID: <?= $id_prod ?></p>
        <h2><?= $nombre ?></h2>
        <form method="POST">
            <input type="hidden" name="action" value="<?= isset($_SESSION['deseos'][$id_prod]) ? 'remove' : 'add' ?>">
            <button type="submit" class="corazon" style="color: <?= isset($_SESSION['deseos'][$id_prod]) ? 'red' : 'gray' ?>;">
                <i class="fas fa-heart"></i>
            </button>
        </form>
        <p>Precio: $<?= $precio ?></p>
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
