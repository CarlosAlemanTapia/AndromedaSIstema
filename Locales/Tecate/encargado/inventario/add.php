<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["existencia"]) ||
	!isset($_POST["cuanto"]) || 
	!isset($_POST["usuarion"]) ||   
	!isset($_POST["id_productos"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../../base_de_datos.php";

date_default_timezone_set("America/Tijuana");

$ahora = date("Y-m-d H:i:s");

$id_productos = $_POST["id_productos"];
$codigo = $_POST["codigo"];
$existencia = $_POST["existencia"];
$cuanto = $_POST["cuanto"];
$usuarion = $_POST["usuarion"];
$suc = 'Tecate';

$suma = $existencia + $cuanto;



$sentencia = $base_de_datos->prepare("UPDATE productos SET existencia = ? WHERE id_productos = ?;");

$resultado = $sentencia->execute([$suma, $id_productos]);

$sentencia2 = $base_de_datos->prepare("INSERT INTO merca_nueva_historial(codigo_mnh, fecha_llegada, existencia_anterior, cuanto_llego, usuario, sucursal) VALUES (?, ?, ?, ?, ?,?);");

$resultado2 = $sentencia2->execute([$codigo, $ahora,$existencia,$cuanto,$usuarion, $suc]);

if($resultado === TRUE){
	?>
	<script>window.close();</script>
	<?php
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>