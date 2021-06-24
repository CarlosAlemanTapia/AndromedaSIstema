<?php

	date_default_timezone_set("America/Tijuana");

	$ahora = date("Y-m-d");

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Mercacia_Llego_Dia_'.$ahora.'.xls');


	include_once "../../../base_de_datos.php";
	$sentencia = $base_de_datos->query("SELECT * FROM merca_nueva_historial where fecha_llegada like '%$ahora%' and sucursal = 'Real' ;");
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<table border="1" id="example">
										<thead>
											<tr>
												<th>Codigo Barra</th>
												<th>Fecha Que Llego</th>
												<th>Existencia Anterior</th>
												<th>Mercancia Nueva Que Llego</th>
												<th>Responsable</th>
											</tr>
										</thead>
										<tbody>
											
											<?php foreach($productos as $producto){ ?>

											<tr>
												
												<td><?php echo $producto->codigo_mnh ?></td>
												<td><?php echo $producto->fecha_llegada	 ?></td>
												<td><?php echo $producto->existencia_anterior ?></td>
												<td><?php echo $producto->cuanto_llego ?></td>
												<td><?php echo $producto->usuario ?></td>
												
											</tr>
											<?php } ?>

										</tbody>
									</table>