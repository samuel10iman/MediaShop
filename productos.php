<?php
$tipo = $_GET['tipo'] ?? 'imagen';
$categoria = $_GET['categoria'] ?? '';

if (isset($mostrar_titulo) && $mostrar_titulo) {
    $titulo = "Productos de " . ucfirst($categoria);
    echo "<h1>" . $titulo . "</h1>";
}

// Título
$titulo = "Productos de " . ucfirst($categoria);

// Todos los productos (manual)
$productos_todos = [
    // tipo, subcategoria, id, nombre, imagen
    ['tipo' => 'imagen', 'categoria' => 'NATURALEZA', 'id' => 101, 'nombre' => 'Montañas', 'img' => 'imagenes/categorias/imagenes/naturaleza/montanas.jpg'],
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
    ['tipo' => 'imagen', 'categoria' => 'CIENCIA Y MEDICINA', 'id' => 118, 'nombre' => 'Doctor', 'img' => 'imagenes/categorias/imagenes/cienciaymedicina/doctor.jpg'],

    ['tipo' => 'video', 'categoria' => 'ANIMALES', 'id' => 201, 'nombre' => 'Perro aullando', 'img' => 'imagenes/categorias/videos/animales/perroaullando.jpg'],
    ['tipo' => 'video', 'categoria' => 'ANIMALES', 'id' => 202, 'nombre' => 'Vida marina', 'img' => 'imagenes/categorias/videos/animales/vidamarina.jpg'],
    ['tipo' => 'video', 'categoria' => 'ANIMALES', 'id' => 203, 'nombre' => 'Focas felices', 'img' => 'imagenes/categorias/videos/animales/focasfelices.jpg'],
    ['tipo' => 'video', 'categoria' => 'PERSONAS', 'id' => 204, 'nombre' => 'Celbración de gol', 'img' => 'imagenes/categorias/videos/personas/gol.jpg'],
    ['tipo' => 'video', 'categoria' => 'PERSONAS', 'id' => 205, 'nombre' => 'Hombre bailando', 'img' => 'imagenes/categorias/videos/personas/bailando.jpg'],
    ['tipo' => 'video', 'categoria' => 'PERSONAS', 'id' => 206, 'nombre' => 'Mujer cocinando', 'img' => 'imagenes/categorias/videos/personas/cocinando.jpg'],
    ['tipo' => 'video', 'categoria' => 'DEPORTES', 'id' => 207, 'nombre' => 'Partido de basquet', 'img' => 'imagenes/categorias/videos/deportes/basquet.jpg'],
    ['tipo' => 'video', 'categoria' => 'DEPORTES', 'id' => 208, 'nombre' => 'Boxeadores', 'img' => 'imagenes/categorias/videos/deportes/box.jpg'],
    ['tipo' => 'video', 'categoria' => 'DEPORTES', 'id' => 209, 'nombre' => 'Tenistas', 'img' => 'imagenes/categorias/videos/deportes/tennis.jpg'],
    ['tipo' => 'video', 'categoria' => 'INFANTILES', 'id' => 210, 'nombre' => 'Pocoyo Corto', 'img' => 'imagenes/categorias/videos/infantiles/pocoyo.jpg'],
    ['tipo' => 'video', 'categoria' => 'INFANTILES', 'id' => 211, 'nombre' => 'Tom y Jerry', 'img' => 'imagenes/categorias/videos/infantiles/tomyjerry.jpg'],
    ['tipo' => 'video', 'categoria' => 'INFANTILES', 'id' => 212, 'nombre' => 'Paw Patrol', 'img' => 'imagenes/categorias/videos/infantiles/pawpatrol.jpg'],
    ['tipo' => 'video', 'categoria' => 'MOTIVACIONALES', 'id' => 213, 'nombre' => 'Ibai motivación', 'img' => 'imagenes/categorias/videos/motivacionales/ibai.jpg'],
    ['tipo' => 'video', 'categoria' => 'MOTIVACIONALES', 'id' => 214, 'nombre' => 'Llados', 'img' => 'imagenes/categorias/videos/motivacionales/llados.jpg'],
    ['tipo' => 'video', 'categoria' => 'MOTIVACIONALES', 'id' => 215, 'nombre' => 'Conferencia', 'img' => 'imagenes/categorias/videos/motivacionales/conferencia.jpg'],
    ['tipo' => 'video', 'categoria' => 'CIUDADES', 'id' => 216, 'nombre' => 'Lima', 'img' => 'imagenes/categorias/videos/ciudades/lima.jpg'],
    ['tipo' => 'video', 'categoria' => 'CIUDADES', 'id' => 217, 'nombre' => 'Moscú', 'img' => 'imagenes/categorias/videos/ciudades/moscu.jpg'],
    ['tipo' => 'video', 'categoria' => 'CIUDADES', 'id' => 218, 'nombre' => 'Barcelona', 'img' => 'imagenes/categorias/videos/ciudades/barcelona.jpg'],

    ['tipo' => 'audio', 'categoria' => 'CANCIONES', 'id' => 301, 'nombre' => 'Hysteria', 'img' => 'imagenes/categorias/audios/canciones/hysteria.jpg'],
    ['tipo' => 'audio', 'categoria' => 'CANCIONES', 'id' => 302, 'nombre' => 'Cuánto me duele', 'img' => 'imagenes/categorias/audios/canciones/morat.jpg'],
    ['tipo' => 'audio', 'categoria' => 'CANCIONES', 'id' => 303, 'nombre' => 'No me conoce', 'img' => 'imagenes/categorias/audios/canciones/nomecoonoce.jpg'],
    ['tipo' => 'audio', 'categoria' => 'EFECTOS', 'id' => 304, 'nombre' => 'Rebote', 'img' => 'imagenes/categorias/audios/efectos/rebote.jpg'],
    ['tipo' => 'audio', 'categoria' => 'EFECTOS', 'id' => 305, 'nombre' => 'Impacto', 'img' => 'imagenes/categorias/audios/efectos/impacto.jpg'],
    ['tipo' => 'audio', 'categoria' => 'EFECTOS', 'id' => 306, 'nombre' => 'Zumbido', 'img' => 'imagenes/categorias/audios/efectos/zumbido.jpg'],
    ['tipo' => 'audio', 'categoria' => 'GRITOS', 'id' => 307, 'nombre' => 'Grito de terror mujer', 'img' => 'imagenes/categorias/audios/gritos/gritomujer.jpg'],
    ['tipo' => 'audio', 'categoria' => 'GRITOS', 'id' => 308, 'nombre' => 'Grito de terror hombre', 'img' => 'imagenes/categorias/audios/gritos/gritohombre.jpg'],
    ['tipo' => 'audio', 'categoria' => 'GRITOS', 'id' => 309, 'nombre' => 'Grito hinchada', 'img' => 'imagenes/categorias/audios/gritos/hinchadaal.jpg'],
    ['tipo' => 'audio', 'categoria' => 'ANIMALES', 'id' => 310, 'nombre' => 'Pájaros cantando', 'img' => 'imagenes/categorias/audios/animales/pajaros.jpg'],
    ['tipo' => 'audio', 'categoria' => 'ANIMALES', 'id' => 311, 'nombre' => 'Gato maullando', 'img' => 'imagenes/categorias/audios/animales/gato.jpg'],
    ['tipo' => 'audio', 'categoria' => 'ANIMALES', 'id' => 312, 'nombre' => 'Castor comiendo', 'img' => 'imagenes/categorias/audios/animales/castor.jpg'],
    ['tipo' => 'audio', 'categoria' => 'VEHICULOS', 'id' => 313, 'nombre' => 'Mustang', 'img' => 'imagenes/categorias/audios/vehiculos/mustang.jpg'],
    ['tipo' => 'audio', 'categoria' => 'VEHICULOS', 'id' => 314, 'nombre' => 'Moto acuática', 'img' => 'imagenes/categorias/audios/vehiculos/motoac.jpg'],
    ['tipo' => 'audio', 'categoria' => 'VEHICULOS', 'id' => 315, 'nombre' => 'Avión', 'img' => 'imagenes/categorias/audios/vehiculos/avion.jpg'],
    ['tipo' => 'audio', 'categoria' => 'HIMNOS', 'id' => 316, 'nombre' => 'Himno Perú', 'img' => 'imagenes/categorias/audios/himnos/peru.jpg'],
    ['tipo' => 'audio', 'categoria' => 'HIMNOS', 'id' => 317, 'nombre' => 'Himno Bolivia', 'img' => 'imagenes/categorias/audios/himnos/bolivia.jpg'],
    ['tipo' => 'audio', 'categoria' => 'HIMNOS', 'id' => 318, 'nombre' => 'Himno Mongolia', 'img' => 'imagenes/categorias/audios/himnos/mongolia.jpg'],
];

// Filtro por tipo y subcategoría
$productos = array_filter($productos_todos, function ($p) use ($tipo, $categoria) {
    return $p['tipo'] === $tipo && $p['categoria'] === $categoria;
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?> | MediaShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Mismo estilo de tienda.php */
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

<!-- Barra superior -->
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
    <h3><?= $titulo ?></h3>
    <div class="productos">
        <?php if (empty($productos)): ?>
            <p>No hay productos en esta categoría aún.</p>
        <?php else: ?>
            <?php foreach ($productos as $p): ?>
                <?php $detalle = "detalle_{$tipo}.php?id=" . $p['id']; ?>
                <button class="producto" onclick="location.href='<?= $detalle ?>'">
                    <img src="<?= $p['img'] ?>" alt="<?= $p['nombre'] ?>">
                    <p><?= $p['nombre'] ?></p>
                </button>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
