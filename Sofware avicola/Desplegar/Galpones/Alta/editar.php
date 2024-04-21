<?php include '../template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once '../conexion.php';
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("select * from aves where id = ?;");
    $sentencia->execute([$codigo]);
    $aves = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtAlta" required 
                        value="<?php echo $aves->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Especie: </label>
                        <input type="text" class="form-control" name="txtGalpon" autofocus required
                        value="<?php echo $aves->especie; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $aves->genero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Galpon: </label>
                        <input type="number" class="form-control" name="txtOrigen" autofocus required
                        value="<?php echo $aves->galpon; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $aves->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>