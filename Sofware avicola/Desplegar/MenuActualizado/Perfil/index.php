
<?php
session_start(); // Iniciar sesión (debe estar al principio del archivo)

// Verificar si la identificación de sesión almacenada en la página coincide con una sesión válida
if (!isset($_SESSION['Usuario'])) {
    // Si la identificación de sesión no coincide, redirigir al usuario a la página de inicio de sesión
    header("Location: ../../Login_pollin/logout.php");
    exit();
}

// El resto del contenido de la página aquí
?>
<?php
include_once "../../Galpones/conexion.php";
$sentencia = $bd->query("select * from galpones");
$galpones = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Clarence Taylor</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/icoGALli06.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Perfil</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../Galpones.crud/galpones.php">Galpones</a></li>
                <li class="nav-item"><a name="" id="" class="nav-link btn btn-primary text-white" href="fpdf/PruebaH.php" role="button"><i class="fa-solid fa-file-pdf"></i></i> generar reporte</a></li>

            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Bienvenido
                    <span class="text-primary"><?php echo $_SESSION['Usuario'];  ?></span>
                </h1>

                <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                Galpones
                            </div>
                            <div class="p-4">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Ubicación</th>
                                            <th scope="col">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($galpones as $dato) {
                                        ?>

                                            <tr>
                                                <td scope="row"><?php echo $dato->id; ?></td>
                                                <td><?php echo $dato->usuario; ?></td>
                                                <td><?php echo $dato->ubicacion; ?></td>
                                                <td><?php echo $dato->fecha; ?></td>
                                            </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>

</html>