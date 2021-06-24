<?php

if(!isset($_GET["id_servicios"])) exit();
$id = $_GET["id_servicios"];

include_once "../../../base_de_datos.php";

$sentencia = $base_de_datos->prepare("DELETE FROM venta_servicios WHERE id_servicios = ?;");
$resultado = $sentencia->execute([$id]);

if($resultado === TRUE){
	header("Location: ./vistahisventasjoya.php");
	exit;
}
else echo "Algo salió mal";
?>