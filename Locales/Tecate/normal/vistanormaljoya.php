<?php   

  include '../../database.php';

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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Andromeda</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<link rel="icon" href="../../assets/img/andromeda_icon.png" type="image/png"/>

	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Mukta+Vanni">
	<style type="text/css">
		
		#contenedor{
			width: 80%;
			background: #5970FF ;
			margin: 0 auto;
			padding: 20px;
			border-radius: 12px;
			-moz-border-radius: 12px;
			-o-border-radius: 12px;
			-webkit-border-radius: 12px;
		}

		#caja-chat{
			width: 100%;
			height: 400px;
			
		}

		#datos-chat{
			width: 100%;
			padding: 5px;
			margin-bottom: 5px;
			border-bottom: 1px solid silver; 
			font-weight: bold;
			font-family: 'Mukta Vaani', sans-serif;
			
		}

		input[type='text']{
			width: 100%;
			height: 40px;
			border: 1px solid gray;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		
		}

		input[type='submit']{
			width: 100%;
			height: 40px;
			border: 1px solid gray;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-o-border-radius:  5px;
			-webkit-border-radius: 5px;
			cursor:  pointer;
		}

		textarea{
			width: 100px;
			height: 40px;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-o-border-radius: 5px;
			-webkit-border-radius: 5px;
		}

		input. textarea{
			margin-bottom: 3px;

		}

		div.scroll_horizontal {
	width: 100%;
	height: 400px;
	overflow-y: scroll;
	border: 1px solid #666;
	background-color: #ccc;
	padding: 8px;
}

	</style>
		<script type="text/javascript">
		
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET','chat.php', true);
			req.send();

		}

		// refresca

		setInterval(function(){ajax();}, 1000);
	</script>

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<!-- <img src="../../assets/img/andromeda_logo_.png" alt="navbar brand" class="navbar-brand" width="85%;"> -->
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
					<h1 style="margin-left:40%; font-family: Decorative; color: white;" >A N D R O M E D A</h1>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							
		
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../../assets/img/<?= $user['foto_us']; ?>" alt="..." class="avatar-img rounded-circle">

								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/<?= $user['foto_us']; ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $user['nombre_us']; ?></h4>
												<p class="text-muted"><?= $user['sucursal_us']; ?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../../php/salir.php">Logout</a>
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
							<img src="../../assets/img/<?= $user['foto_us']; ?>" alt="..." class="avatar-img rounded-circle">
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
						<button style="width: 100%" class="btn btn-info" onclick="window.location.href='./vistanormaljoya.php'"><i class="fas fa-home"></i> Inicio</button>
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
										<a href="inventario/vistainventariojoya.php">
											<span class="sub-item">Interno</span>
										</a>
									</li>
									<li>
										<a href="inventario/inventarioglobal.php">
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
										<a href="equipos/vistaequiposandroid.php">
											<span class="sub-item">Android</span>
										</a>
									</li>
									<li>
										<a href="equipos/vistaequiposapple.php">
											<span class="sub-item">Apple</span>
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
										<a href="Pedidos/vistapedidos.php">
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
								<h2 class="text-white pb-2 fw-bold">Bienvenido <?= $user['nombre_us']; ?></h2>
								<h5 class="text-white op-7 mb-2">Sala De Chat</h5>
							</div>
							
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
								
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
									<div id="contenedor">

										<div id="caja-chat">
											<div id="chat" class="scroll_horizontal">
										
												
											</div>
										</div>
										<form method="POST" action="form.php">

											<input type="hidden" name="nombre" value="<?= $user['nombre_us']; ?>">

											<br>
											<textarea style="width: 100%; height: 150px;" name="mensaje" placeholder="Ingresa mensaje" rows="6"></textarea>

											<input type="submit" name="enviar" value="Enviar" >
											
										</form>
										
									</div>
									
									</div>
								</div>
							</div>
						</div>
						
					</div>

					
				<?php
					include_once "../../base_de_datos.php";
					$sentencia = $base_de_datos->query("SELECT * FROM pedidos where status <> 'Parte en el local' and sucursal = 'Tecate' order by id_pedido desc ;");
					$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
				?>

					<div class="row">	
						<div class="col-md-12">
							<div class="card card-primary bg-primary-gradient">
								<div class="card-body">
									<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Lista De Pedidos Pendientes</h4>
													<table class="table table-hover" >
										<thead>
											<tr>
												<th scope="col"># Pedido</th>
												<th scope="col">Cliente</th>
												<th scope="col">Fecha Pedido</th>
												<th scope="col">Fecha Estimada</th>
												<th scope="col">Parte Pedida</th>
												<th scope="col">Status</th>
												
											</tr>
										</thead>
										<tbody>
											
											<?php foreach($productos as $producto){ ?>

											<tr>
												
												<td><?php echo $producto->id_pedido ?></td>
												<td><?php echo $producto->nombre_cliente ?></td>
												<td><?php echo $producto->fecha ?></td>
												<td><?php echo $producto->tiempo_estimado ?></td>
												<td><?php echo $producto->parte ?></td>
												<td><?php echo $producto->status ?></td>
												
												
												
											</tr>
											<?php } ?>

										</tbody>
									</table>
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
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>

	
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
	<script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();
} );</script>
</body>
</html>
<?php
} else {
  header("location:../../../index.php");
  }
 ?>