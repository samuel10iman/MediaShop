<?php
include 'conexion.php';

$busqueda = $_POST['busqueda'] ?? '';

if (!empty($busqueda)) {
    $consulta = $conexion->prepare("SELECT * FROM producto WHERE nombre_prod LIKE ?");
    $likeBusqueda = "%$busqueda%";
    $consulta->bind_param('s', $likeBusqueda);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $tipo = htmlspecialchars($row['tipo_prod']);
            $id = htmlspecialchars($row['id_prod']);
            $nombre = htmlspecialchars($row['nombre_prod']); // Cambiado a nombre_prod
            $vista_previa = htmlspecialchars($row['ruta_preview']); // Correcto

            // Define a qué página enviar según el tipo de producto
            $pagina_detalle = "";
            if ($tipo == "imagen") {
                $pagina_detalle = "detalle_imagen.php?id=$id";
            } elseif ($tipo == "video") {
                $pagina_detalle = "detalle_video.php?id=$id";
            } elseif ($tipo == "audio") {
                $pagina_detalle = "detalle_audio.php?id=$id";
            }

            echo "<div style='text-align: center; margin: 10px;'>
                    <a href='$pagina_detalle'>
                        <img src='$vista_previa' style='width: 100px; height: 100px; object-fit: cover; border-radius: 10px;'>
                    </a>
                    <div style='margin-top: 5px;'>$nombre</div> <!-- Ahora sí muestra el nombre -->
                  </div>";
        }
    } else {
        echo "<div>No se encontró el producto.</div>";
    }
}
?>
