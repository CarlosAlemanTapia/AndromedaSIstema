<?php

if(!isset($_GET["id_productos"])) exit();
if(!isset($_GET["usuario"])) exit();


$id = $_GET["id_productos"];
$usuarion = $_GET["usuario"];

include_once "../../../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id_productos = ?;");
$sentencia->execute([$id]);

$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){

	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Poner Mas</title>
		<link rel="icon" href="../../../assets/img/andromeda_icon.png" type="image/png"/>

	<!-- Fonts and icons -->
	<script src="../../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../../assets/css/demo.css">
</head>
<body>

<br>
<br>
<h2 align="center">Agregar Productos</h2>
<form method="post" action="add.php">


													<input type="hidden" name="id_productos" value="<?php echo $producto->id_productos; ?>">
	
													<div class="form-group form-group-default">
														<label>Codigo Barra</label>
														<input id="codigo" name="codigo" type="text" class="form-control" value="<?php echo $producto->codigo ?>" required="Ingresa" readonly>
													</div>

														<input type="hidden" name="existencia" value="<?php echo $producto->existencia; ?>">

													<div class="form-group form-group-default">
														<label>Cuantos</label>
														<input id="cuanto" name="cuanto" type="number" class="form-control" required="Ingresa">
													</div>

													<input type="hidden" name="usuarion" id="usuarion" value="<?php echo $usuarion; ?>">
													
													<br><br><input class="btn btn-info" type="submit" value="Guardar">
													
												</form>

</body>
</html>
