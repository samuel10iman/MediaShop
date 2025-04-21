<?php
include 'productos.php';

$query = strtolower($_GET['q'] ?? '');

$resultados = [];

foreach ($productos_todos as $producto) {
    if (strpos(strtolower($producto['nombre']), $query) !== false) {
        $resultados[] = $producto;
    }
}

// Generar HTML de los resultados
foreach ($resultados as $p) {
    echo '<div class="resultado-item" onclick="location.href=\'detalle_' . $p['tipo'] . '.php?id=' . $p['id'] . '\'">';
    echo '<img src="' . $p['img'] . '" alt="' . $p['nombre'] . '">';
    echo '<span>' . $p['nombre'] . ' (' . ucfirst($p['tipo']) . ')</span>';
    echo '</div>';
}
?>
