<?php
//print_r($_POST);
if (empty($_POST["huevos"]) || empty($_POST["id_ave"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once '../conexion.php';
$id = $_POST["id_ave"];
$huevos = $_POST["huevos"];

$sentencia = $bd->prepare("UPDATE aves SET huevos = ? where id = ?;");
$resultado = $sentencia->execute([$huevos,$id]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
