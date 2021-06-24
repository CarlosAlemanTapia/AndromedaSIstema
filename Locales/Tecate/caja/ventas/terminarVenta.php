<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];

include_once "../../../base_de_datos.php";


date_default_timezone_set("America/Tijuana");

$ahora = date("Y-m-d H:i:s");

$sucursal_venta = "Tecate";


$sentencia = $base_de_datos->prepare("INSERT INTO ventas (fecha, total, sucursal_venta) VALUES (?, ?, ?);");
$sentencia->execute([$ahora, $total, $sucursal_venta]);

$sentencia = $base_de_datos->prepare("SELECT id_venta FROM ventas ORDER BY id_venta DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id_venta;

$base_de_datos->beginTransaction();

$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_productos, id_venta, cantidad, sucursal_vendido) VALUES (?, ?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id_productos = ?;");

foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id_productos, $idVenta, $producto->cantidad, $sucursal_venta]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id_productos]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vistaventasjoya.php?status=1");
?>