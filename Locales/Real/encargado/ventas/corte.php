<?php

	date_default_timezone_set("America/Tijuana");

	$ahora = date("Y-m-d");

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Corte_Dia_'.$ahora.'.xls');


	include_once "../../../base_de_datos.php";

	$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id_venta, GROUP_CONCAT( productos.codigo, '..', productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos, id_productos_vendidos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id_venta INNER JOIN productos ON productos.id_productos = productos_vendidos.id_productos where ventas.sucursal_venta = 'Real' and ventas.fecha like '%$ahora%' GROUP BY ventas.id_venta ORDER BY ventas.id_venta ;");
	$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

	$sentencia2 = $base_de_datos->query("SELECT * FROM venta_servicios where sucursal = 'Real' and fecha like '%$ahora%' ");
	$productos2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);

?>

						<table border="1" >
			<thead>
				<tr>
					<th># venta</th>
					<th>Fecha De Venta</th>
					<th>Productos vendidos</th>
					<th>Total $</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id_venta ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									
									<th>Descripcion</th>
								
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[1] ?></td>	
								</tr>
								<?php } ?>
							</tbody>
						</table>
							<td><?php echo $venta->total ?></td>
						</td>
					</tr>
				</tbody>
			<?php } ?>
			</table>

<table border="1" id="example2" style="margin-left:350px;">
										<thead>
											<tr>
												<th>.</th>
												<th>Descripcion</th>
												<th>Fecha</th>
												<th>Total</th>
										
											</tr>
										</thead>
										<tbody>
											
											<?php foreach($productos2 as $producto2){ ?>

											<tr>
												<td>.</td>
												<td><?php echo $producto2->descripcion ?></td>
												<td><?php echo $producto2->fecha	 ?></td>
												<td><?php echo $producto2->precio ?></td>
												
											</tr>
											<?php } ?>

										</tbody>
									</table>