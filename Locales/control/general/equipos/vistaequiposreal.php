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
					<h1 style="margin-left:40%; font-family: Decorative; color: white;" >A N D R O M E D A</h1>
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
								<p>Pedidos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../Pedidos/vistapedidoslajoya.php">
											<span class="sub-item">La Joya</span>
										</a>
									</li>
									<li>
										<a href="../Pedidos/vistapedidoslasfuentes.php">
											<span class="sub-item">Las Fuentes</span>
										</a>
									</li>
									<li>
										<a href="../Pedidos/vistapedidoslasbrisas.php">
											<span class="sub-item">Las Brisas</span>
										</a>
									</li>

									<li>
										<a href="../Pedidos/vistapedidostecate.php">
											<span class="sub-item">Tecate</span>
										</a>
									</li>

									<li>
										<a href="../Pedidos/vistapedidosreal.php">
											<span class="sub-item">Real SFC</span>
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
										<a href="./vistaequiposjoya.php">
											<span class="sub-item">La Joya</span>
										</a>
									</li>
									<li>
										<a href="./vistaequiposlasbrisas.php">
											<span class="sub-item">Las Brisas</span>
										</a>
									</li>
									<li>
										<a href="./vistaequiposlasfuentes.php">
											<span class="sub-item">Las Fuentes</span>
										</a>
									</li>
									<li>
										<a href="./vistaequipostecate.php">
											<span class="sub-item">Tecate</span>
										</a>
									</li>
									<li>
										<a href="./vistaequiposreal.php">
											<span class="sub-item">Real SFC</span>
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
								<h2 class="text-white pb-2 fw-bold">Equipos Para Reparacion</h2>
								<h5 class="text-white op-7 mb-2">Andromeda Reparaciones</h5>
							</div>
				
						</div>
					</div>
				</div>

				<?php
					include_once "../../../base_de_datos.php";
					$sentencia = $base_de_datos->query("SELECT * FROM equipos where status <> 'Entregado' and marca <> 'Apple' and sucursal = 'Real' order by numero_nota desc ;");
					$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
				?>

				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title"><b>Lista De Equipos Android Real SFC</b> </div>
									<br>
									
									<table class="table table-hover" >
										<thead>
											<tr>
												<th scope="col"># Nota</th>
												<th scope="col">Cliente</th>
												<th scope="col">Modelo</th>
												
												<th scope="col">Trabajo</th>
												<th scope="col">Falla</th>
												<th scope="col">Nota</th>
										
											</tr>
										</thead>
										<tbody>
											
											<?php foreach($productos as $producto){ ?>

											<tr>
												
												<td><?php echo $producto->numero_nota ?></td>
												<td><?php echo $producto->nombre_cliente ?></td>
												<td><?php echo $producto->modelo ?></td>
											
												<td><?php echo $producto->trabajo ?></td>
												<td><?php echo $producto->falla_equipo ?></td>
												<td><a class="btn btn-info" href="<?php echo "notasandroid.php?numero_nota=" . $producto->numero_nota?>"><i class="fas fa-notes-medical"></i></a></td>
												
												
											</tr>
											<?php } ?>

										</tbody>
									</table>

									</div>
								</div>
							</div>
								<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title"><b>Lista De Equipos Apple Real SFC</b> </div>

												<?php
					include_once "../../../base_de_datos.php";
					$sentencia2 = $base_de_datos->query("SELECT * FROM equipos where status <> 'Entregado' and marca = 'Apple' and sucursal = 'Real' order by numero_nota desc ;");
					$productos2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
				?>
														<table class="table table-hover" >
										<thead>
											<tr>
												<th scope="col"># Nota</th>
												<th scope="col">Cliente</th>
												<th scope="col">Modelo</th>
												<th scope="col">Trabajo</th>
												<th scope="col">Falla</th>
												<th scope="col">Nota</th>
										
											</tr>
										</thead>
										<tbody>
											
											<?php foreach($productos2 as $producto2){ ?>

											<tr>
												
												<td><?php echo $producto2->numero_nota ?></td>
												<td><?php echo $producto2->nombre_cliente ?></td>
												<td><?php echo $producto2->modelo ?></td>
												
												<td><?php echo $producto2->trabajo ?></td>
												<td><?php echo $producto2->falla_equipo ?></td>
												<td><a class="btn btn-info" href="<?php echo "notasandroid.php?numero_nota=" . $producto2->numero_nota?>"><i class="fas fa-notes-medical"></i></a></td>
												
												
											</tr>
											<?php } ?>

										</tbody>
									</table>
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

<!-- 	<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];

    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script> -->

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</body>
</html>
<?php
} else {
  header("location:../../../../index.php");
  }
 ?>	