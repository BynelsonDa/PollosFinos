<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pollos finos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
</head>

<body id="page-top">
<?php

if (!isset($_SESSION['Usuario'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: ../Login_pollin/logout.php");
    exit();
}
?>


    <!-- Navigation-->
    <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#page-top">POLLOSFINOS</a></li>
            <li class="sidebar-nav-item"><a href="Perfil/index.php">Perfil</a></li>
            <li class="sidebar-nav-item"><a href="#page-top">Inicio</a></li>
            <li class="sidebar-nav-item"><a href="#about">Administrar</a></li>
            <li class="sidebar-nav-item"><a href="#services">Ayuda</a></li>
            <li class="sidebar-nav-item"><a href="../Login_pollin/logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <!-- Header-->
    <header class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="mb-1 text-white">Bienvenido</h1>
            <h3 class="mb-5 text-secondary"><em>A HUEVOSFINOS</em></h3>
            <a class="btn btn-secondary btn-xl text-white" href="Perfil/index.php">Perfil</a>
        </div>
    </header>
    <!-- About-->
    <section class="content-section bg-" id="about">
        <div class="container px-4 px-lg-5 text-center">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <h2>Administrar galpones</h2>
                    <p class="lead mb-5">
                        Sistema de administración de aves y gestion de información

                    </p>
                    <a class="btn btn-dark btn-xl" href="/Sofware avicola/Desplegar/Galpones.crud/galpones.php">Agregar Galpon</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="content-section bg-secondary text-white text-center" id="services">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading">
                <h3 class="text-secondary mb-0">Services</h3>
                <h2 class="mb-5">Lo que puedes hacer</h2>
            </div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                    <h4><strong>Registrar aves</strong></h4>

                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                    <h4><strong>Registrar Galpon</strong></h4>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                    <h4><strong>Administrar producción</strong></h4>
                </div>
                <div class="col-lg-3 col-md-6">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                    <h4><strong>Registrar ganancias</strong></h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>