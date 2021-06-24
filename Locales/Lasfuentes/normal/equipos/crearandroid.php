<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre_cliente"]) || !isset($_POST["telefono_cliente"]) || !isset($_POST["marca"]) || !isset($_POST["modelo"]) || !isset($_POST["color"]) || !isset($_POST["contra"]) || !isset($_POST["falla_equipo"]) || !isset($_POST["trabajo"]) || !isset($_POST["cracks"]) || !isset($_POST["enciende"]) || !isset($_POST["detalles_equipo"]) || !isset($_POST["quien_recibio"]) || !isset($_POST["precio"]) || !isset($_POST["abonos"]) || !isset($_POST["status"]) || !isset($_POST["sucursal"])) exit();

#Si todo va bien, se ejecuta esta parte del código...


date_default_timezone_set("America/Tijuana");

$ahora = date("Y-m-d H:i:s");

include_once "../../../base_de_datos.php";


$nombre_cliente = $_POST["nombre_cliente"];
$telefono_cliente = $_POST["telefono_cliente"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$color = $_POST["color"];
$contra = $_POST["contra"];
$falla_equipo = $_POST["falla_equipo"];
$trabajo = $_POST["trabajo"];
$cracks = $_POST["cracks"];
$enciende = $_POST["enciende"];
$detalles_equipo = $_POST["detalles_equipo"];
$quien_recibio = $_POST["quien_recibio"];
$precio = $_POST["precio"];
$abonos = $_POST["abonos"];
$status = $_POST["status"];
$sucursal = $_POST["sucursal"];


$sentencia = $base_de_datos->prepare("INSERT INTO equipos(fecha_llegada, nombre_cliente, telefono_cliente, marca, modelo,color, contra, falla_equipo, trabajo,cracks ,enciende,detalles_equipo,quien_recibio,precio, abonos,status,sucursal) VALUES (?,?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$ahora, $nombre_cliente, $telefono_cliente, $marca, $modelo, $color,$contra,$falla_equipo,$trabajo,$cracks,$enciende,$detalles_equipo,$quien_recibio,$precio,$abonos,$status,$sucursal]);

if($resultado === TRUE){
	header("Location: vistaequiposandroid.php");
	exit;
}
else echo "Algo salió mal.";


?>