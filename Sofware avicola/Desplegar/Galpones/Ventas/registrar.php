<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtGalpon"]) || empty($_POST["txtCliente"])|| empty($_POST["txtPesoKg"])|| empty($_POST["txtTotal"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once '../conexion.php';
    $Galpon = $_POST["txtGalpon"];
    $Cliente = $_POST["txtCliente"];
    $PesoKg = $_POST["txtPesoKg"];
    $Total = $_POST["txtTotal"];
    
    $sentencia = $bd->prepare("INSERT INTO ventas(Galpon,Cliente,PesoKg,Total) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$Galpon,$Cliente,$PesoKg,$Total]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>