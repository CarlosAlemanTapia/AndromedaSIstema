<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre_us=$_POST['nombre_us'];
		$puesto_us=$_POST['puesto_us'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);
		$nivel_us=$_POST['nivel_us'];
		$sucursal_us=$_POST['sucursal_us'];
		$foto_us=$_POST['foto_us'];

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into usuarios (nombre_us,puesto_us,usuario,password,nivel_us,sucursal_us,foto_us)
				values ('$nombre_us','$puesto_us','$usuario','$password','$nivel_us','$sucursal_us','$foto_us')";
			echo $result=mysqli_query($conexion,$sql);

		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from usuarios 
				where usuario='$user' and password='$pass'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>