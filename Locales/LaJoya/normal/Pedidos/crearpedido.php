<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre_cliente"]) || !isset($_POST["telefono_cliente"]) || !isset($_POST["marca"]) || !isset($_POST["modelo"]) || !isset($_POST["parte"]) || !isset($_POST["dejo_equipo"]) || !isset($_POST["precio_total"]) || !isset($_POST["abonos"]) || !isset($_POST["status"]) || !isset($_POST["sucursal"])) exit();

#Si todo va bien, se ejecuta esta parte del código...


date_default_timezone_set("America/Tijuana");

$ahora = date("Y-m-d H:i:s");

include_once "../../../base_de_datos.php";

$nuevafecha = strtotime ( '+12 day' , strtotime ( $ahora ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$nombre_cliente = $_POST["nombre_cliente"];
$telefono_cliente = $_POST["telefono_cliente"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$parte = $_POST["parte"];
$dejo_equipo = $_POST["dejo_equipo"];
$precio_total = $_POST["precio_total"];
$abonos = $_POST["abonos"];
$status = $_POST["status"];
$sucursal = $_POST["sucursal"];


$sentencia = $base_de_datos->prepare("INSERT INTO pedidos(nombre_cliente, telefono_cliente,fecha, marca, modelo,parte, dejo_equipo, precio_total, abonos,tiempo_estimado ,status,sucursal) VALUES (?,?, ?, ?, ?, ?, ?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombre_cliente, $telefono_cliente,$ahora, $marca,$modelo,$parte, $dejo_equipo, $precio_total,$abonos,$nuevafecha,$status,$sucursal]);

if($resultado === TRUE){
	header("Location: vistapedidos.php");
	exit;
}
else echo "Algo salió mal.";


?>