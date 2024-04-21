<?php 
$inc = include("../db.php");
if ($inc) {
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $nombre = $row['nombre'];
        $apellido = $row['apellido'];
	    ?>
        <div>
        	<h2><?php echo $nombre; ?> <?php echo $apellido; ?> </h2>
          
        	<div>
        		<p>
        			<b>ID: </b> <?php $id ?><br>
        		    <b>Email: </b> <?php $email ?><br>
        		    <b>Fecha Registro: </b> <?php $fechareg ?><br>
        		</p>
        	</div>
        </div> 
	    <?php
	    }
	}
}
?>