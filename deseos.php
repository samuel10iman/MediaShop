<?php
session_start();
include 'conexion.php';

$deseos = $_SESSION['deseos'] ?? [];

if (empty($deseos)) {
    echo "<script>alert('No tienes productos en tu lista de deseos'); window.location='tienda.php';</script>";
    exit();
}

// Si se pidió eliminar un producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $idEliminar = $_POST['id_prod'] ?? '';
    if (!empty($idEliminar)) {
        unset($_SESSION['deseos'][$idEliminar]);
        header('Location: deseos.php');
        exit();
    }
}

// Obtener los ids de productos en deseos
$ids = implode(',', array_keys($deseos));

// Traer los productos desde la base de datos
$consulta = $conexion->query("SELECT id_prod, nombre_prod, precio, ruta_preview, tipo_prod FROM producto WHERE id_prod IN ($ids)");

$productos = [];
while ($row = $consulta->fetch_assoc()) {
    $productos[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Deseos | MediaShop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #fff; color: #333; }
        .producto { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 10px; display: flex; gap: 20px; align-items: center; }
        .producto img { width: 100px; height: 100px; object-fit: cover; border-radius: 5px; }
        .producto-info { flex-grow: 1; }
        .producto-info h3 { margin: 0 0 10px; }
        .producto-info p { margin: 5px 0; }
        .botones { display: flex; gap: 10px; margin-top: 10px; }
        .botones a, .botones button {
            padding: 8px 15px;
            background: #6a0dad;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .botones button {
            background: #e63946;
        }
        .volver { margin-top: 20px; display: inline-block; padding: 10px 20px; background: #6a0dad; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

<h1>Mis Productos en Deseo</h1>

<?php foreach ($productos as $prod): ?>
    <div class="producto">
        <img src="<?= htmlspecialchars($prod['ruta_preview']) ?>" alt="<?= htmlspecialchars($prod['nombre_prod']) ?>">
        <div class="producto-info">
            <h3><?= htmlspecialchars($prod['nombre_prod']) ?></h3>
            <p>Precio: $<?= htmlspecialchars($prod['precio']) ?></p>
            <div class="botones">
                <?php
                    // Determinar a qué página ir según el tipo de producto
                    $detallePage = '';
                    if ($prod['tipo_prod'] === 'audio') {
                        $detallePage = 'detalle_audio.php';
                    } elseif ($prod['tipo_prod'] === 'video') {
                        $detallePage = 'detalle_video.php';
                    } elseif ($prod['tipo_prod'] === 'imagen') {
                        $detallePage = 'detalle_imagen.php';
                    }
                ?>
                <a href="<?= $detallePage ?>?id=<?= $prod['id_prod'] ?>">Ver detalles</a>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id_prod" value="<?= $prod['id_prod'] ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<a href="tienda.php" class="volver">Volver a la tienda</a>

</body>
</html>
