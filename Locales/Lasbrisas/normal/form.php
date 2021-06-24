
<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["mensaje"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...


include "../../base_de_datos.php";


$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

$sentencia = $base_de_datos->query("INSERT INTO chat (nombre,mensaje) values ('$nombre','$mensaje')");
$lchat = $sentencia->fetchAll(PDO::FETCH_OBJ);
														
	?>
								<script type="text/javascript">
								window.location.replace("./vistanormaljoya.php");
								</script>
							<?php 
?>