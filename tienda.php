<?php
include('conexion.php'); // Conectar a la base de datos

// Consultar productos aleatorios para "Recientemente añadidos"
$sql = "SELECT id_prod, nombre_prod, ruta_preview, tipo_prod FROM producto ORDER BY RAND() LIMIT 6"; // Limitar a 6 productos aleatorios
$result = $conexion->query($sql);

// Verificar si hay productos
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
} else {
    echo "No se encontraron productos.";
}
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
<input type="text" id="busqueda" placeholder="Buscar productos...">
<div id="resultados_busqueda" style="position:absolute; background:white; width:100%; z-index:999; max-height:400px; overflow:auto;">
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
<!-- Recientemente añadidos -->
<div class="seccion-productos">
    <h3>Recientemente añadidos</h3>
    <div class="productos">
        <?php foreach ($productos as $producto) { ?>
            <button class="producto" 
                onclick="window.location='<?php echo ($producto['tipo_prod'] == 'videos') ? 'detalle_video.php' : (($producto['tipo_prod'] == 'audios') ? 'detalle_audio.php' : 'detalle_imagen.php'); ?>?id=<?php echo $producto['id_prod']; ?>'">
                <img src="imagenes/categorias/<?php echo $producto['tipo_prod']; ?>/<?php echo $producto['ruta_preview']; ?>" 
                     alt="<?php echo $producto['nombre_prod']; ?>">
                <p><?php echo $producto['nombre_prod']; ?></p>
            </button>
        <?php } ?>
    </div>
</div>

<!-- Promociones -->
<div class="seccion-productos">
    <h3>Promociones</h3>
    <div class="productos">
        <?php foreach ($productos as $producto) { ?>
            <button class="producto" 
                onclick="window.location='<?php echo ($producto['tipo_prod'] == 'videos') ? 'detalle_video.php' : (($producto['tipo_prod'] == 'audios') ? 'detalle_audio.php' : 'detalle_imagen.php'); ?>?id=<?php echo $producto['id_prod']; ?>'">
                <img src="imagenes/categorias/<?php echo $producto['tipo_prod']; ?>/<?php echo $producto['ruta_preview']; ?>" 
                     alt="<?php echo $producto['nombre_prod']; ?>">
                <p><?php echo $producto['nombre_prod']; ?></p>
            </button>
        <?php } ?>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $("#busqueda").keyup(function(){
        var texto = $(this).val();
        if(texto != ""){
            $.ajax({
                url: "buscar_productos.php",
                method: "POST",
                data: { busqueda: texto },
                success: function(data){
                    $("#resultados_busqueda").html(data);
                }
            });
        } else {
            $("#resultados_busqueda").html("");
        }
    });
});
</script>



</body>
</html>
