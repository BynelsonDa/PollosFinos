<?php include '../template/header.php' ?>

<?php
include_once "../conexion.php";
$sentencia = $bd->query("select * from aves");
$aves = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

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
            <div class="container-xxxl">
                <div class="row">
                    <div class="col-2">
                        <div class="card">
                            <div class="card-header">
                                Agregar huevos
                                <div class="mb-3">
                                    <form class="p-4" method="POST" action="agregar_huevo.php">
                                        <label class="form-label">ID ave: </label>
                                        <input type="number" class="form-control" name="id_ave" autofocus required>
                                        <br>
                                        <label class="form-label">Total huevos: </label>
                                        <input type="number" class="form-control" name="huevos" autofocus required>
                                        <input type="submit" class="btn btn-primary mt-2" value="Agregar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                Registro
                            </div>
                            <div class="p-4">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Especie</th>
                                            <th scope="col">Genero</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Huevos</th>
                                            <th scope="col">Galpon</th>
                                            <th scope="col" colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($aves as $dato) {
                                        ?>

                                            <tr>
                                                <td scope="row"><?php echo $dato->id; ?></td>
                                                <td><?php echo $dato->nombre; ?></td>
                                                <td><?php echo $dato->especie; ?></td>
                                                <td><?php echo $dato->genero; ?></td>
                                                <td><?php echo $dato->fecha; ?></td>
                                                <td><?php echo $dato->huevos; ?></td>
                                                <td><?php echo $dato->galpon; ?></td>
                                                <td><a class="text-success" href="editar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                            </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header">
                                Ingresar datos:
                            </div>
                            <form class="p-4" method="POST" action="registrar.php">
                                <div class="mb-3">

                                    <div class="mb-3">
                                        <label class="form-label">Nombre: </label>
                                        <input type="text" class="form-control" name="txtAlta" autofocus required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Especie: </label>
                                        <input type="text" class="form-control" name="txtGalpon" autofocus required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Genero: </label>
                                        <input type="text" class="form-control" name="txtFecha" autofocus required>
                                    </div>
                                    <?php

                                    if (isset($_POST['galpon'])) {;
                                        $numero = $_POST['numero'];
                                    }
                                    ?>

                                    <div class="mb-3">
                                        <label class="form-label">Galpon: </label>
                                        <input type="number" value="<?php echo "$numero" ?>" class="form-control" name="txtOrigen" autofocus required onlyread>
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

        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>