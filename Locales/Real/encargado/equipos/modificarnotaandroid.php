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

    date_default_timezone_set("America/Tijuana");

		$ahora = date("Y-m-d H:i:s");

    if (count($results) > 0) {
      $user = $results;
    }

?>

<?php 
	
	$idnota = $_GET['numero_nota'];

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
	<style type="text/css">
#capa1{margin-top:0px;margin-left:50px;width:712px;height:1020px;float:left;background-color:white;color:black;clear:both;border: 5px groove #006600;}

p{
	font-family: 'Roboto', sans-serif;

}


#d1{
float:left;
background:black;
background-color: white;
width: 250px;
height: 80px;
margin-right: 10px;
margin-top: 10px;
margin-left: 10px;
}
#d1-1{
float:left;
background:black;
background-color: white;
width: 200px;
height: 95px;
margin-right: 10px;
margin-top: 10px;
margin-left: 10px;
color: black;

}
#d1-2{
float:left;
background:black;
font-color:black;
background-color: white;
width: 200px;
height: 55px;
margin-right: 10px;
margin-top: 0px;
margin-left: 0px;

}


#d2{
float:left;
background:#CC6600;
background-color: white;
width: 410px;
height: 40px;
margin-right: 10px;
margin-top: 5px;
margin-left: 10px;
color: black;
border: 2px solid #aaaaaa;
}
#d3{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 85px;
margin-right: 10px;
margin-top: -95px;
margin-left: 510px;
color: black;
border: 5px dotted #aaaaaa;
}
#d4{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 90px;
margin-right: 10px;
margin-top: -10px;
margin-left: 510px;
color: black;
/*border: 5px double #aaaaaa;*/
}
#d5{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 145px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
	
}
#d5-1{
float:left;
background:#CC6600;
background-color: white;
width: 350px;
height: 170px;
margin-right: 0px;
margin-top: -55px;
margin-left: 0px;
color: black;
/*border: 2px solid #aaaaaa;*/
}
	
#d5-3{
float:left;
background:#CC6600;
background-color: white ;
width: 330px;
height: 150px;
margin-right: 0px;
margin-top: -35px;
margin-left: px;
color: black;
/*border: 2px solid #aaaaaa;*/

}

#d66{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 40px;
margin-right: 10px;
margin-top: -40px;
margin-left: 10px;
color: black;
border: 2px solid black;
}

#d6{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 78px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d7{
float:left;
background:#CC6600;
background-color: white;
width: 340px;
height: 80px;
margin-right: 0px;
margin-top: -4px;
margin-left: 0px;
border: 2px solid black;

}
#d8{
float:left;
background:#CC6600;
background-color: white;
width: 336px;
height: 80px;
margin-right: 0px;
margin-top: -4px;
margin-left: 0px;
border: 2px solid black;

}

#d99{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 40px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
border: 2px solid black;
}

#d99-2{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 40px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d99-3{
float:left;
background:#CC6600;
background-color: white;
width: 330px;
height: 55px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
border: 5px solid #aaaaaa;
}
#d9{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 250px;
margin-right: 10px;
margin-top: -5px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d10{
float:left;
background:#CC6600;
background-color: white;
width: 346px;
height: 85px;
margin-right: 0px;
margin-top: -2px;
margin-left: 0px;
border: 2px solid black;
}
#d11{
float:left;
background:#CC6600;
background-color: white;
width: 330px;
height: 85px;
margin-right: 0px;
margin-top: -2px;
margin-left: 0px;
border: 2px solid black;
}
#d12{
float:left;
background:#CC6600;
background-color: white;
width: 677px;
height: 85px;
margin-right: 0px;
margin-top: 0px;
margin-left: 0px;
border: 2px solid black;
}


#d133{
float:left;
background:#CC6600;
background-color: white;
width: 350px;
height: 40px;
margin-right: 5px;
margin-top: 10px;
margin-left: 10px;
color: black;
float: left;
}


#d13{
float:left;
background:#CC6600;
background-color: white;
width: 200px;
height: 330px;
margin-right: 10px;
margin-top: -40px;
margin-left: 10px;
color: black;
float: left;
}


#d13-d{
float:left;
background:#CC6600;
background-color: white;
width: 120px;
height: 320px;
margin-right: 10px;
margin-top: 10px;
margin-left: 0px;
color: black;
float: left;
}

#d14{
float:left;
background:#CC6600;
background-color: white;
width: 450px;
height: 320px;
margin-right: 10px;
margin-top: 10px;
margin-left: 10px;
color: black;

}
#d15{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}

#d16{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}
#d17{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}
#d18{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 65px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 1px solid #aaaaaa;
}

#d19{
float:left;
background:#CC6600;
background-color: white;
width: 180px;
height: 100px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
float: left;
border: 1px solid #aaaaaa;
}
#d20{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 30px;
margin-right: 10px;
margin-top: 5px;
margin-left: 10px;
color: black;

}

#d21{
float:left;
background:#CC6600;
background-color: white;
width: 150px;
height: 40px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
}

#d22{
float:left;
background:#CC6600;
background-color: white;
width: 150px;
height: 50px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;
float: left;
}
#d23{
float:left;
background:#CC6600;
background-color: white;
width: 150px;
height: 50px;
margin-right: 10px;
margin-top: 15px;
margin-left: 10px;
color: black;

}

.txt {
   width: 460px;
   height: 85px;
 }

 #dfin{
float:left;
background:#CC6600;
background-color: white;
width: 600px;
height: 30px;
margin-right: 10px;
margin-top: -5px;
margin-left: 50px;
color: black;
float: left;
}

#d9-2{
float:left;
background:#CC6600;
background-color: white;
width: 680px;
height: 170px;
margin-right: 10px;
margin-top: 0px;
margin-left: 10px;
color: black;
border: 2px solid black;
}
#d10-2{
float:left;
background:#CC6600;
background-color: white;
width: 338px;
height: 85px;
margin-right: 0px;
margin-top: -3px;
margin-left: 0px;
border: 2px solid black;
}
#d11-2{
float:left;
background:#CC6600;
background-color: white;
width: 338px;
height: 85px;
margin-right: 0px;
margin-top: -3px;
margin-left: 0px;
border: 2px solid black;
}
#d12-2{
float:left;
background:#CC6600;
background-color: white;
width: 678px;
height: 85px;
margin-right: 0px;
margin-top: 0px;
margin-left: 0px;
border: 2px solid black;
}

</style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<!-- <img src="../../../assets/img/andromeda_logo_.png" alt="navbar brand" class="navbar-brand" width="85%;"> -->
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
	
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../../../assets/img/<?= $user['foto_us']; ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../../assets/img/<?= $user['foto_us']; ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $user['nombre_us']; ?></h4>
												<p class="text-muted"><?= $user['sucursal_us']; ?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../../../php/salir.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../../../assets/img/<?= $user['foto_us']; ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $user['nombre_us']; ?>
									<span class="user-level"><?= $user['puesto_us']; ?></span>
									
								</span>
							</a>

						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<button style="width: 100%" class="btn btn-info" onclick="window.location.href='../vistaencargadojoya.php'"><i class="fas fa-home"></i> Inicio</button>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Modulos</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Inventario</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../inventario/vistainventariojoya.php">
											<span class="sub-item">Interno</span>
										</a>
									</li>
									<li>
										<a href="../inventario/inventarioglobal.php">
											<span class="sub-item">Global</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Equipos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="../equipos/vistaequiposandroid.php">
											<span class="sub-item">Android</span>
										</a>
									</li>
									<li>
										<a href="../equipos/vistaequiposapple.php">
											<span class="sub-item">Apple</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Ventas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="../ventas/vistahisventasjoya.php">
											<span class="sub-item">Historial De Ventas</span>
										</a>
									</li>
									<li>
										<a href="../ventas/vistaventasjoya.php">
											<span class="sub-item">Venta Nueva</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Pedidos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="../Pedidos/vistapedidos.php">
											<span class="sub-item">Pedidos Partes</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Agregar Una Nota Nueva</h2>
								<h5 class="text-white op-7 mb-2">Andromeda Reparaciones</h5>
							</div>
							
						</div>
					</div>
				</div>

	

				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
							

											<?php
														include_once "../../../base_de_datos.php";
														$sentencia = $base_de_datos->query("SELECT * FROM equipos where numero_nota = $idnota;");
														$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
													?>


											<form method="post" action="modificardatosnotas.php">
														<?php foreach($productos as $producto){ ?>

												
													<input type="hidden" id="numero_nota" name="numero_nota" value="<?php echo $idnota ?>">

												
													<div class="form-group form-group-default">
														<label>Nombre Cliente:</label>
														<input id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" value="<?php echo $producto->nombre_cliente ?>">
													</div>

													<div class="form-group form-group-default">
														<label>Nuemero De Cleinte:</label>
														<input id="telefono_cliente" name="telefono_cliente" type="text" class="form-control" value="<?php echo $producto->telefono_cliente ?>">
													</div>

											

													<div class="form-group form-group-default">
														<label>Marca:</label>
														 <select name="marca" id="marca" class="form-group form-group-default">

								                <option value="Samsung">Samsung</option>
								                <option value="Otro">Otro</option>
								                <option value="Lg">Lg</option>
								                <option value="Motorola">Motorola</option>
								                <option value="Huawei">Huawei</option>
								                <option value="Iphone">Iphone</option>
								                <option value="Alcatel">Alcatel</option>
								                <option value="Sony">Sony</option>
								                <option value="Lenovo">Lenovo</option>
								                <option value="Htc">Htc</option>
								                <option value="Zte">Zte</option>
								                <option value="Lanix">Lanix</option>
								                <option value="Nokia">Nokia</option>
								                <option value="OnePlus">One Plus</option>
								                <option value="Xiaomi">Xiaomi</option>
								                <option value="Vivo">Vivo</option>
								                <option value="Blue">Blue</option>
								                <option value="Verycool">Verycool</option>
								                <option value="Google">Google</option>
								                <option value="Oppo">Oppo</option>
								                <option value="Blackvery">Blackvery</option>
								                <option value="Asus">Asus</option>
								                <option value="M4">M4</option>
								                <option value="Polaroid">Polaroid</option>
								                <option value="Zumm">Zumm</option>
								                <option value="Hisense">Hisense</option>
								                <option value="HP">HP</option>
								              </select>
            
													</div>


													<div class="form-group form-group-default">
														<label>Modelo:</label>
														<input id="modelo" name="modelo" type="text" class="form-control" value="<?php echo $producto->modelo ?>">
													</div>

													<div class="form-group form-group-default">
														<label>Color:</label>
														<input id="color" name="color" type="text" class="form-control" value="<?php echo $producto->color ?>" >
													</div>



													<div class="form-group form-group-default">
														<label>Contraseña:</label>
														<input id="contra" name="contra" type="text" class="form-control" value="<?php echo $producto->contra ?>">
													</div>

													<div class="form-group form-group-default">
														<label>Falla Del Equipo:</label>
														<input id="falla_equipo" name="falla_equipo" type="text" class="form-control" value="<?php echo $producto->falla_equipo ?>" >
													</div>



													<div class="form-group form-group-default">
														<label>Trabajo A Realizar:</label>
														<input id="trabajo" name="trabajo" type="text" class="form-control" value="<?php echo $producto->trabajo ?>">
													</div>

													<div class="form-group form-group-default">
														<label>Cracks:</label>
															<select name="cracks" id="cracks" class="form-group form-group-default">
								                
								                <option value="Si">SI</option>
								                <option value="No">NO</option>
								             
								              </select>
													</div>

													<div class="form-group form-group-default">
														<label>Enciende:</label>
															 <select name="enciende" id="enciende" class="form-group form-group-default">
															 
								                <option value="Si">SI</option>
								                <option value="No">NO</option>
								              
								              </select>
								            </div>


													<div class="form-group form-group-default">
														<label>Detalles Del Equipo:</label>
														<input id="detalles_equipo" name="detalles_equipo" type="text" class="form-control" value="<?php echo $producto->detalles_equipo ?>">
													</div>


													<input type="hidden" id="quien_recibio" name="quien_recibio" value="<?= $user['nombre_us']; ?>">


													<div class="form-group form-group-default">
														<label>Precio:</label>
														<input id="precio" name="precio" type="text" class="form-control" value="<?php echo $producto->precio ?>">
													</div>


													<div class="form-group form-group-default">
														<label>Abonos:</label>
														<input id="abonos" name="abonos" type="text" class="form-control" value="<?php echo $producto->abonos ?>">
													</div>

												

														<div class="form-group form-group-default">
														<label>Status:</label>
															 <select name="status" id="status" class="form-group form-group-default">
															 <option value="<?php echo $producto->status ?>"><?php echo $producto->status ?></option>
								                <option value="En Proceso">En Proceso</option>
								                <option value="Para Entregar">Para Entregar</option>
								                <option value="Entregado">Entregado</option>
								              
								              </select>
								            </div>

													<input type="hidden" id="sucursal" name="sucursal" value="<?php echo $producto->sucursal ?>">

												
												
													
													<br><br><input class="btn btn-info" type="submit" value="Guardar">
													<a class="btn btn-warning" href="./vistaequiposandroid.php">Cancelar</a>

													<?php } ?>
												</form>
											
							

									</div>
								</div>
							</div>
						</div>
						
					</div>

					
					
					
				
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="">
									Andromeda Reparaciones
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2021, made with <i class="fa fa-heart heart text-danger"></i> by Aleman</a>
					</div>				
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="../../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../../assets/js/core/popper.min.js"></script>
	<script src="../../../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../../assets/js/atlantis.min.js"></script>

	
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>

</body>
</html>
<?php
} else {
  header("location:../../../../index.php");
  }
 ?>