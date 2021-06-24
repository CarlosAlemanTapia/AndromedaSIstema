<?php 

  	require 'database.php';

	session_start();

	if(isset($_SESSION['user'])){

	$quien = $_SESSION['user'];

    $records = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :id');
    $records->bindParam(':id', $quien);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  


 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
				<!-- <a href="php/salir.php" class="btn btn-info">Salir del sistema</a>
					<h2>Entraste con exito</h2>
					<?= $user['id']; ?> -->

					<?php 

						echo $user['nombre_us'];

						$sucursal_us = $user['sucursal_us'];
						$nivel_us = $user['nivel_us'];


						if($sucursal_us == "LA JOYA" and $nivel_us == "Encargado")
						{
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lajoya/encargado/vistaencargadojoya.php");
								</script>
							<?php 
						}
						elseif ($sucursal_us == "LA JOYA" and $nivel_us == "Normal") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lajoya/normal/vistanormaljoya.php");
								</script>
							<?php 
						}
							elseif ($sucursal_us == "LA JOYA" and $nivel_us == "Caja") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lajoya/caja/ventas/vistaventasjoya.php");
								</script>
							<?php 
						}


						elseif($sucursal_us == "TECATE" and $nivel_us == "Encargado")
						{
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Tecate/encargado/vistaencargadojoya.php");
								</script>
							<?php 
						}
						elseif ($sucursal_us == "TECATE" and $nivel_us == "Normal") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Tecate/normal/vistanormaljoya.php");
								</script>
							<?php 
						}
							elseif ($sucursal_us == "TECATE" and $nivel_us == "Caja") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Tecate/caja/ventas/vistaventasjoya.php");
								</script>
							<?php 
						}



									elseif($sucursal_us == "LAS BRISAS" and $nivel_us == "Encargado")
						{
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lasbrisas/encargado/vistaencargadojoya.php");
								</script>
							<?php 
						}
						elseif ($sucursal_us == "LAS BRISAS" and $nivel_us == "Normal") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lasbrisas/normal/vistanormaljoya.php");
								</script>
							<?php 
						}
							elseif ($sucursal_us == "LAS BRISAS" and $nivel_us == "Caja") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lasbrisas/caja/ventas/vistaventasjoya.php");
								</script>
							<?php 
						}



										elseif($sucursal_us == "LAS FUENTES" and $nivel_us == "Encargado")
						{
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lasfuentes/encargado/vistaencargadojoya.php");
								</script>
							<?php 
						}
						elseif ($sucursal_us == "LAS FUENTES" and $nivel_us == "Normal") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lasfuentes/normal/vistanormaljoya.php");
								</script>
							<?php 
						}
							elseif ($sucursal_us == "LAS FUENTES" and $nivel_us == "Caja") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Lasfuentes/caja/ventas/vistaventasjoya.php");
								</script>
							<?php 
						}





										elseif($sucursal_us == "REAL" and $nivel_us == "Encargado")
						{
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Real/encargado/vistaencargadojoya.php");
								</script>
							<?php 
						}
						elseif ($sucursal_us == "REAL" and $nivel_us == "Normal") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Real/normal/vistanormaljoya.php");
								</script>
							<?php 
						}
							elseif ($sucursal_us == "REAL" and $nivel_us == "Caja") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/Real/caja/ventas/vistaventasjoya.php");
								</script>
							<?php 
						}



							elseif ($nivel_us == "Jefe") {
								?>
								<script type="text/javascript">
								window.location.replace("Locales/control/general/vistaencargadojoya.php");
								</script>
							<?php 
						}


					
						?>

				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
} else {
	header("location:index.php");
	}
 ?>
