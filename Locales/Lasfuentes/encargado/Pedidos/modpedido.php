<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_pedido"]) || !isset($_POST["nombre_cliente"]) || !isset($_POST["telefono_cliente"]) || !isset($_POST["marca"]) || !isset($_POST["modelo"]) || !isset($_POST["parte"]) || !isset($_POST["dejo_equipo"]) || !isset($_POST["precio_total"]) || !isset($_POST["abonos"]) || !isset($_POST["status"]) || !isset($_POST["sucursal"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../../base_de_datos.php";

$id_pedido = $_POST["id_pedido"];
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


$sentencia = $base_de_datos->prepare("UPDATE pedidos set nombre_cliente = ?, telefono_cliente = ?,marca =?, modelo =?,parte=?, dejo_equipo= ?, precio_total= ?, abonos= ? ,status= ?,sucursal= ? WHERE id_pedido = ? ;");

$resultado = $sentencia->execute([$nombre_cliente, $telefono_cliente, $marca,$modelo,$parte, $dejo_equipo, $precio_total,$abonos,$status,$sucursal,$id_pedido]);

if($resultado === TRUE){
	header("Location: vistapedidos.php");
	exit;
}
else echo "Algo salió mal.";


?>