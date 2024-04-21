<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include '../conexion.php';
    $codigo = $_POST['codigo'];
    $Ganancia = $_POST["txtGanancia"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];

    $sentencia = $bd->prepare("UPDATE Ganancias SET Galpon = ?, Origen = ?, Fecha = ?, Ganancia=? where codigo = ?;");
    $resultado = $sentencia->execute([$Galpon,$Origen,$Fecha,$Ganancia,$codigo]);


    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>