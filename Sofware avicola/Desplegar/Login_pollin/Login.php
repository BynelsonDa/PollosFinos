<?php
session_start(); // Iniciar sesión (debe estar al principio del archivo)

include '../db.php';

// Verificar si se han enviado las variables POST
if(isset($_POST['Usuario'], $_POST['Clave'])) {
    $Usuario = $_POST['Usuario'];
    $Clave = $_POST['Clave'];
    

    // Escapar las variables para evitar inyección SQL (mejor aún, usar consultas preparadas)
    $Usuario = mysqli_real_escape_string($conex, $Usuario);
    $Clave = mysqli_real_escape_string($conex, $Clave);

    $sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' AND Clave = '$Clave'";
    $resultado = mysqli_query($conex, $sql);

    // Verificar si se encontraron registros
    if (mysqli_num_rows($resultado) > 0) {
        // Iniciar sesión y redirigir al usuario al menú principal
        $_SESSION['Usuario'] = $Usuario;
        header("Location: ../MenuActualizado/index.php");
        exit();
    } else {
        // Mostrar ventana emergente con mensaje de error
        echo '<script>alert("Error de credenciales");</script>';
        
        // Redirigir de vuelta a la página de inicio de sesión
        echo '<script>window.location.href = "index.php";</script>';
    }
} else {
    // Si no se han enviado las variables POST, redirigir de vuelta a la página de inicio de sesión
    header("Location: index.php");
    exit();
}
?>