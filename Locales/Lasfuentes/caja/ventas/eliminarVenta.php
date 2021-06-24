<?php

if(!isset($_GET["id_venta"])) exit();
$id = $_GET["id_venta"];

include_once "../../../base_de_datos.php";

$sentencia = $base_de_datos->prepare("DELETE FROM ventas WHERE id_venta = ?;");
$resultado = $sentencia->execute([$id]);

if($resultado === TRUE){
	header("Location: ./vistahisventasjoya.php");
	exit;
}
else echo "Algo salió mal";
?>