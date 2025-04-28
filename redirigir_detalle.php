<?php
include('conexion.php');

if (isset($_GET['id_prod'])) {
    $id_prod = intval($_GET['id_prod']);
    
    // Buscar tipo del producto
    $query = "SELECT tipo FROM producto WHERE id_prod = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('i', $id_prod);
    $stmt->execute();
    $stmt->bind_result($tipo);
    $stmt->fetch();
    $stmt->close();

    if ($tipo === 'audio') {
        header("Location: detalle_audio.php?id=$id_prod");
    } elseif ($tipo === 'imagen') {
        header("Location: detalle_imagen.php?id=$id_prod");
    } elseif ($tipo === 'video') {
        header("Location: detalle_video.php?id=$id_prod");
    } else {
        // Si no existe el tipo o es inválido
        header('Location: tienda.php');
    }
    exit;
} else {
    header('Location: tienda.php');
    exit;
}
