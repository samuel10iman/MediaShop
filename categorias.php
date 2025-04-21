<?php
// Obtenemos el tipo por GET
$tipo = $_GET['tipo'] ?? 'imagen'; // Valor por defecto: imagen

// Título según tipo
$titulo = '';
$categorias = [];

switch ($tipo) {
    case 'video':
        $titulo = 'Categorías de Video';
        $categorias = [
            ['nombre' => 'ANIMALES', 'img' => 'imagenes/categorias/videos/animales.jpg'],
            ['nombre' => 'PERSONAS', 'img' => 'imagenes/categorias/videos/personas.jpg'],
            ['nombre' => 'DEPORTES', 'img' => 'imagenes/categorias/videos/deportes.jpg'],
            ['nombre' => 'INFANTILES', 'img' => 'imagenes/categorias/videos/infantiles.jpg'],
            ['nombre' => 'MOTIVACIONALES', 'img' => 'imagenes/categorias/videos/motivacionales.jpg'],
            ['nombre' => 'CIUDADES', 'img' => 'imagenes/categorias/videos/ciudades.jpg']
        ];
        break;
    case 'imagen':
        $titulo = 'Categorías de Imagen';
        $categorias = [
            ['nombre' => 'NATURALEZA', 'img' => 'imagenes/categorias/imagenes/naturaleza.jpg'],
            ['nombre' => 'EDUCACIÓN', 'img' => 'imagenes/categorias/imagenes/educacion.jpg'],
            ['nombre' => 'COMIDA Y BEBIDAS', 'img' => 'imagenes/categorias/imagenes/comidasybebidas.jpg'],
            ['nombre' => 'DEPORTES', 'img' => 'imagenes/categorias/imagenes/deportes.jpg'],
            ['nombre' => 'ARQUITECTURA', 'img' => 'imagenes/categorias/imagenes/arquitectura.jpg'],
            ['nombre' => 'CIENCIA Y MEDICINA', 'img' => 'imagenes/categorias/imagenes/cienciaymedicina.jpg'],
        ];
        break;
    case 'audio':
        $titulo = 'Categorías de Audio';
        $categorias = [
            ['nombre' => 'CANCIONES', 'img' => 'imagenes/categorias/audios/canciones.jpg'],
            ['nombre' => 'EFECTOS', 'img' => 'imagenes/categorias/audios/efectos.jpg'],
            ['nombre' => 'GRITOS', 'img' => 'imagenes/categorias/audios/gritos.jpg'],
            ['nombre' => 'ANIMALES', 'img' => 'imagenes/categorias/audios/animales.jpg'],
            ['nombre' => 'VEHICULOS', 'img' => 'imagenes/categorias/audios/vehiculos.jpg'],
            ['nombre' => 'HIMNOS', 'img' => 'imagenes/categorias/audios/himnos.jpg'],
        ];
        break;
    default:
        $titulo = 'Categorías';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?> | MediaShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Pegado desde tienda.php */
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
    <h3><?= $titulo ?></h3>
    <div class="productos">
        <?php foreach ($categorias as $cat): ?>
            <button class="producto" onclick="location.href='productos.php?tipo=<?= $tipo ?>&categoria=<?= urlencode($cat['nombre']) ?>'">
                <img src="<?= $cat['img'] ?>" alt="<?= $cat['nombre'] ?>">
                <p><?= $cat['nombre'] ?></p>
            </button>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
