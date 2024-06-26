<?php include '../template/header.php' ?>

<?php
include_once "../conexion.php";
$sentencia = $bd->query("select * from salud");
$salud = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($ventas);
?>
<link rel="stylesheet" href="Salud.css">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="">
            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los d0atos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <!-- fin alerta -->
            <div class="card col-8 my-auto mx-auto">
                <div class="card-header">
                    Control de salud
                </div>
                <div class="p-4">
                    <table class="table align-middle ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre </th>
                                <th scope="col">Medico </th>
                                <th scope="col">Galpon</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Vacunas</th>
                                <th scope="col">Coste</th>
                                <th scope="col">Alimento</th>

                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($salud as $dato) {
                            ?>

                                <tr>
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->nombre_ave; ?></td>
                                    <td><?php echo $dato->Medico; ?></td>
                                    <td><?php echo $dato->Galpon; ?></td>
                                    <td><?php echo $dato->Fecha; ?></td>
                                    <td><?php echo $dato->Vacunas; ?></td>
                                    <td><?php echo $dato->Coste; ?></td>
                                    <td><?php echo $dato->Alimento; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="re card ">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="../Alta/index.php">
                    <input type="submit" class="btn btn-primary" value="Ver Aves">
                </form>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">ID Ave: </label>
                        <input type="text" class="form-control" name="txtIDave" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Ave: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Medico: </label>
                        <input type="text" class="form-control" name="txtMedico" autofocus required>
                    </div>

                    <?php
                    if (isset($_POST['galpon'])) {;
                        $numero = $_POST['numero'];
                    }
                    ?>

                    <div class="mb-3">
                        <label class="form-label">Galpon: </label>
                        <input type="number" value="<?php echo "$numero" ?>" class="form-control" name="txtGalpon" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vacunas: </label>
                        <input type="text" class="form-control" name="txtVacunas" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Coste: </label>
                        <input type="text" class="form-control" name="txtCoste" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alimento: </label>
                        <input type="text" class="form-control" name="txtAlimento" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        <a name="" id="" class="mt-3 btn btn-primary" href="fpdf/PruebaH.php" role="button"><i class="fa-regular fa-file-pdf"></i>Generar Reporte</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>