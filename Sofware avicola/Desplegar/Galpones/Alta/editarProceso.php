<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }
    
    include_once '../conexion.php';
    $codigo = $_POST['id'];
    $Altas = $_POST["txtAlta"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];

    $sentencia = $bd->prepare("UPDATE aves SET nombre = ?, especie = ?, genero = ?, galpon=? where id = ?;");
    $resultado = $sentencia->execute([$Altas,$Galpon,$Fecha,$Origen,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>