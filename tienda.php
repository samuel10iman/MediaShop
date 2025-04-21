
<?php
$mostrar_titulo = false; // Estableces en false si no quieres que el título se muestre al incluirlo
include('productos.php');

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

$productos_recientes = array_slice($productos, 0, 7);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MediaShop</title>
    <style>
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

        /* Barra superior blanca */
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

        /* Barra gris/plateada */
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

        /* Buscador extendible */
        .search-bar {
            display: none;
            justify-content: center;
            padding: 10px;
            background-color: #f5f5f5;
        }

        .search-bar input {
            width: 60%;
            padding: 8px 12px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Breadcrumb + segundo buscador */
        .breadcrumb {
            padding: 20px 40px 10px;
            font-size: 14px;
        }

        .second-search {
            display: flex;
            justify-content: center;
            padding: 10px 40px;
        }

        .second-search input {
            width: 50%;
            padding: 8px 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Categorías */
        .categorias-section {
            background-color: #000;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .categorias-section h2 {
            margin-bottom: 0px;
        }

        .categorias-buttons {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 20px;
        }

        .categoria {
            background: white;
            color: #333;
            width: 100px;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
        }

        .categoria img {
            width: 60px;
            height: 60px;
        }

        /* Secciones de productos */
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

        /* Footer */
        .footer {
            background-color: #e0e0e0;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            color: #333;
        }

        .footer-section {
            margin: 20px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
        }

        .footer-section i {
            margin-right: 8px;
        }

        .copy-bar {
            background-color: #111;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- Barra blanca -->
<div class="top-bar">
    <span>Entrega a tiempo garantizada</span>
    <span>Atención ágil y eficiente</span>
    <span>100% original</span>
    <span>De confianza</span>
</div>

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

<!-- Buscador extendible -->
<div class="search-bar">
    <input type="text" placeholder="Buscar en MediaShop...">
</div>

<!-- Breadcrumb -->
<div class="breadcrumb">
    Home → Inicio
</div>

<!-- Buscador central -->
<!-- Buscador central con formulario -->
<div class="second-search">
    <form id="search-form" style="width: 100%; display: flex; justify-content: center;">
        <input type="text" id="search-input" name="busqueda" placeholder="Buscar productos..." style="width: 50%; padding: 8px 12px; border-radius: 5px; border: 1px solid #ccc;">
    </form>
</div>

<div id="search-results" style="padding: 20px 40px; color: green; display: none;">
    Buscando...
</div>





<!-- Categorías -->
<div class="categorias-section">
    <h2>Categorías</h2>
    <div class="categorias-buttons">
        <div class="categoria" onclick="window.location='categorias.php?tipo=video'">
            <img src="imagenes/icons/video.png" alt="Videos">
            <div>Videos</div>
        </div>
        <div class="categoria" onclick="window.location='categorias.php?tipo=imagen'">
            <img src="imagenes/icons/imagen.png" alt="Imágenes">
            <div>Imágenes</div>
        </div>
        <div class="categoria" onclick="window.location='categorias.php?tipo=audio'">
            <img src="imagenes/icons/audio.png" alt="Sonidos">
            <div>Sonidos</div>
        </div>
    </div>
</div>

<!-- Recientemente añadidos -->
<div class="seccion-productos">
    <h3>Recientemente añadidos</h3>
    <div class="productos">
        <!-- Producto 1 -->
        <button class="producto" onclick="window.location='detalle_imagen.php?id=101'">
            <img src="imagenes/categorias/imagenes/naturaleza/montanas.jpg" alt="Montañas">
            <p>Montañas</p>
        </button>

        <!-- Producto 2 -->
        <button class="producto" onclick="window.location='detalle_imagen.php?id=115'">
            <img src="imagenes/categorias/imagenes/arquitectura/coliseor.jpg" alt="Coliseo romano">
            <p>Coliseo Romano</p>
        </button>

        <!-- Producto 3 -->
        <button class="producto" onclick="window.location='detalle_video.php?id=218'">
            <img src="imagenes/categorias/videos/ciudades/barcelona.jpg" alt="Barcelona">
            <p>Barcelona</p>
        </button>

        <!-- Producto 4 -->
        <button class="producto" onclick="window.location='detalle_audio.php?id=307'">
            <img src="imagenes/categorias/audios/gritos/gritomujer.jpg" alt="Grito terror mujer">
            <p>Grito terror mujer</p>
        </button>

        <!-- Producto 5 -->
        <button class="producto" onclick="window.location='detalle_audio.php?id=316'">
            <img src="imagenes/categorias/audios/himnos/peru.jpg" alt="Himno Peru">
            <p>Himno Perú</p>
        </button>

        <!-- Producto 6 -->
        <button class="producto" onclick="window.location='detalle_video.php?id=217'">
            <img src="imagenes/categorias/videos/ciudades/moscu.jpg" alt="Moscu">
            <p>Moscú</p>
        </button>

        <!-- Producto 7 -->
        <button class="producto" onclick="window.location='detalle_video.php?id=210'">
            <img src="imagenes/categorias/videos/infantiles/pocoyo.jpg" alt="Pocoyo">
            <p>Pocoyo Corto</p>
        </button>
    </div>
</div>


<!-- Promociones -->
<div class="seccion-productos">
    <h3>Promociones</h3>
    <div class="productos">
        <button class="producto" onclick="window.location='detalle_audio.php?id=306'">
            <img src="imagenes/categorias/audios/efectos/zumbido.jpg" alt="Tienda">
            <p>Zumbido</p>
        </button>

        <button class="producto" onclick="window.location='detalle_imagen.php?id=107'">
            <img src="imagenes/categorias/imagenes/comidasybebidas/gaseosa.jpg" alt="Átomo">
            <p>Gaseosa</p>
        </button>

        <button class="producto" onclick="window.location='detalle_video.php?id=204'">
            <img src="imagenes/categorias/videos/personas/gol.jpg" alt="Coca-Cola">
            <p>Celebración de gol</p>
        </button>

        <button class="producto" onclick="window.location='detalle_audio.php?id=303'">
            <img src="imagenes/categorias/audios/canciones/nomecoonoce.jpg" alt="Laptops">
            <p>No me conoce</p>
        </button>

        <button class="producto" onclick="window.location='detalle_imagen.php?id=111'">
            <img src="imagenes/categorias/imagenes/deportes/natacion.jpg" alt="Piscina">
            <p>Natación</p>
        </button>

        <button class="producto" onclick="window.location='detalle_video.php?id=212'">
            <img src="imagenes/categorias/videos/infantiles/pawpatrol.jpg" alt="Luigi">
            <p>Paw Patrol</p>
        </button>

        <button class="producto" onclick="window.location='detalle_audio.php?id=309'">
            <img src="imagenes/categorias/audios/gritos/hinchadaal.jpg" alt="Playa">
            <p>Grito hinchada</p>
        </button>
    </div>
</div>


<!-- Footer -->
<div class="footer">
    <div class="footer-section">
        <h4>MediaShop</h4>
        <div>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
        </div>
    </div>
    <div class="footer-section">
        <h4>Métodos de pago</h4>
        <div><i class="fab fa-cc-visa"></i> Visa</div>
        <div><i class="fab fa-cc-mastercard"></i> Mastercard</div>
        <div><i class="fas fa-mobile-alt"></i> Yape</div>
        <div><i class="fab fa-cc-amex"></i> American Express</div>
    </div>
    <div class="footer-section">
        <h4>Ayuda</h4>
        <div>Servicio al Cliente</div>
        <div>Preguntas Frecuentes</div>
        <div>Términos y Condiciones</div>
    </div>
    <div class="footer-section">
        <h4>Sobre nosotros</h4>
        <div>MediaShop.com</div>
    </div>
    <div class="footer-section">
        <h4>Contáctanos</h4>
        <div><i class="fas fa-phone"></i> +51 999-999-999</div>
        <div><i class="fas fa-envelope"></i> mediashop@gmail.com</div>
    </div>
</div>

<!-- Copy -->
<div class="copy-bar">
    © 2025 MediaShop - Todos los derechos reservados
</div>



</body>
</html>
