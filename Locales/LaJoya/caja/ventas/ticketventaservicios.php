<?php   

  require '../../../database.php';

  session_start();

  if(isset($_SESSION['user'])){

  $quien = $_SESSION['user'];

    $records = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :id');
    $records->bindParam(':id', $quien);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }

?>

<?php

if(!isset($_GET["id_servicios"])) exit();

$id = $_GET["id_servicios"];

include_once "../../../base_de_datos.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Andromeda</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

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

		<style type="text/css">
		* {
    font-size: 14px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;

}

td.producto,
th.producto {
    width: 120px;
    max-width: 120px;
    
    font-size: 15px;
}

td.cantidad,
th.cantidad {
    width: 80px;
    max-width: 80px;
    word-break: break-all;
   
    font-size: 14px;
}

td.precio,
th.precio {
    width: 60px;
    max-width: 60px;
    word-break: break-all;
    
    font-size: 14px;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 270px;
    max-width: 270px;
   
}

img {
    max-width: inherit;
    width: inherit;

}
}
	</style>
</head>
<body>

	<?php

		

		$sentencia = $base_de_datos->query("SELECT * FROM venta_servicios where id_servicios = '$id' ");

		$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

	?>
				<?php foreach($ventas as $venta){ ?>

				
				 <div class="ticket" align="center">
            <img
                src="../../../assets/img/andromeda_logo_.png"
                alt="Logotipo">
                <br>
                <br>
            	<p style="margin-left: 50px;"><h2>Andromeda Reparacion</h2></p>
                <p style="margin-left: 5px;" class="centrado"><h2>Boulevard El Refugio Oeste 21320, El Florido 1, A y 2a. Sección, 22244 Tijuana, B.C.</h2></p>
                <p style="margin-left: 5px;" class="centrado"><h2>Numero: 664 399 9594</h2></p>
                <p style="margin-left: 5px;"><h2>Fecha: <?php echo $venta->fecha ?></h2></p>
                <br>
            <table>
                <thead>
                    <tr>
                        
                        <th class="producto"><h2>PROD</h2></th>
                        

                    </tr>
                </thead>
                <tbody>
                    <tr>
                     
								<tr>
									
									<td><h2><?php echo $venta->descripcion ?></h2></td>
									
								</tr>
								
                    </tr>
                    <tr>
                        
                        <td class="precio"><h2>TOTAL</h2></td>
                        <td class="precio"><h2> $ <?php echo $venta->precio ?></h2></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <p class="centrado"><h1>¡GRACIAS POR SU COMPRA!</h1></p>
            <p class="centrado"><h2>Andromedafix.mx</h2></p>
        </div>

    <?php } ?>	

    <div style="width: 150px; height: 50px; margin-left: 400px; margin-top: -350px;">
    	<button class="btn btn-info" onclick="imprimir()">Imprimir</button>
    	<br>
    	<br>
    	<a class="btn btn-danger" href="vistahisventasjoya.php">Regresar  <i class="fas fa-chevron-left"></i></a>
    </div>


</body>
</html>

<script type="text/javascript">
	
	function imprimir() {
	  window.print();
	}
</script>
<?php
} else {
  header("location:../../../../index.php");
  }
 ?>