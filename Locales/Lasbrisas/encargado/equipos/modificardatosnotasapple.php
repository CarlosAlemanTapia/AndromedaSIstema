<?php

#Salir si alguno de los datos no está presente
if(!isset($_POST["numero_nota"]) || !isset($_POST["nombre_cliente"]) || !isset($_POST["telefono_cliente"]) || !isset($_POST["marca"]) || !isset($_POST["modelo"]) || !isset($_POST["color"]) || !isset($_POST["contra"]) || !isset($_POST["falla_equipo"]) || !isset($_POST["trabajo"]) || !isset($_POST["cracks"]) || !isset($_POST["enciende"]) || !isset($_POST["detalles_equipo"]) || !isset($_POST["quien_recibio"]) || !isset($_POST["precio"]) || !isset($_POST["abonos"]) || !isset($_POST["status"]) || !isset($_POST["sucursal"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../../base_de_datos.php";

$numero_nota = $_POST["numero_nota"];
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


$sentencia = $base_de_datos->prepare("UPDATE equipos SET nombre_cliente = ?, telefono_cliente = ?, marca = ?, modelo = ?, color = ?, contra = ?, falla_equipo = ?, trabajo = ?, cracks = ?, enciende = ?, detalles_equipo = ?, quien_recibio = ?, precio =?, abonos = ?, status = ?, sucursal = ?  WHERE numero_nota = ?;");

$resultado = $sentencia->execute([$nombre_cliente, $telefono_cliente, $marca, $modelo, $color, $contra, $falla_equipo, $trabajo, $cracks, $enciende, $detalles_equipo, $quien_recibio, $precio, $abonos, $status, $sucursal, $numero_nota]);

if($resultado === TRUE){
	header("Location: ./vistaequiposapple.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>