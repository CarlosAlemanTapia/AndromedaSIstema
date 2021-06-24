<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["descripcion"]) || 
	!isset($_POST["precio"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../../base_de_datos.php";

date_default_timezone_set("America/Tijuana");

$ahora = date("Y-m-d H:i:s");

$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

$sucursal = "Real";



$sentencia2 = $base_de_datos->prepare("INSERT INTO venta_servicios(fecha, descripcion, precio,sucursal) VALUES (?, ?, ?,?);");

$resultado2 = $sentencia2->execute([$ahora, $descripcion,$precio,$sucursal]);


if($resultado2 === TRUE){
	header("Location: ./vistaventasjoya.php");
	exit;
}
else echo "Algo salió mal.";
?>