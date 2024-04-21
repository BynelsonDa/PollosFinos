<?php

include("../db.php");

if (isset($_POST['agregar_galpon'])) {
    $id = $_POST['numero'];
    $nombre = $_POST['usuario'];
    $ubicacion = $_POST['ubicacion'];

    $query = "INSERT INTO galpones(id,usuario, ubicacion) VALUES ('$id','$nombre','$ubicacion')";

    $result = mysqli_query($conex, $query);
    if (!$result) {
        die("Query failed");
    }

    header("Location: galpones.php");
    
}
