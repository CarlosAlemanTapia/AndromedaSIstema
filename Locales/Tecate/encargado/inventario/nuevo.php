<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["existencia"]) || !isset($_POST["sucursal_pro"]) || !isset($_POST["tipo_pro"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../../base_de_datos.php";

$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];
$sucursal_pro = $_POST["sucursal_pro"];
$tipo_pro = $_POST["tipo_pro"];

$sentencia = $base_de_datos->prepare("INSERT INTO productos(codigo, descripcion, precioVenta, existencia, sucursal_pro, tipo_pro) VALUES (?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $existencia, $sucursal_pro, $tipo_pro]);

if($resultado === TRUE){
	header("Location: vistainventariojoya.php");
	exit;
}
else echo "Algo salió mal.";


?>