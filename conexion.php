<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "mediashop"; // <- agregamos el punto y coma y corregimos el nombre

$conexion = new mysqli($server, $user, $pass, $db); // <- corregido $DB por $db

if($conexion->connect_errno){
    die("fallido: " . $conexion->connect_errno); // <- corrección en el mensaje y coma cambiada por punto
}
?>
