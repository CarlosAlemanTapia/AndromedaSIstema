<?php

if(!isset($_GET["numero_nota"])) exit();
$numero_nota = $_GET["numero_nota"];

include_once "../../../base_de_datos.php";

$sentencia = $base_de_datos->prepare("DELETE FROM equipos WHERE numero_nota = ?;");
$resultado = $sentencia->execute([$numero_nota]);
if($resultado === TRUE){
	header("Location: ./vistaequiposandroid.php");
	exit;
}
else echo "Algo salió mal";
?>