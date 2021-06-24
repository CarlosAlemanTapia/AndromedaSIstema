<!DOCTYPE html>
<html lang="en">
<head>
    <title>ANDROMEDA REGISTRO USUARIOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="img/andromeda_icon.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<?php require_once "scripts.php"; ?>

</head>

<body>
<div class="limiter">
        <div class="container-login100" style="background-image: url('img/imagenisp.jpeg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="frmRegistro">
                    <span class="login100-form-logo">
                        <img src="img/andromeda_icon.png" width="50px;" style="margin-left: -5px">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        REGISTRO USUARIOS Andromeda
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nombre_us" id="nombre_us" placeholder="Nombre De Pila">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="puesto_us" id="puesto_us" placeholder="Puesto">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="usuario" id="usuario" placeholder="USERNAME">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" id="password" placeholder="CONTRAÑA">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nivel_us" id="nivel_us" placeholder="Nivel De Usuario">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <h4 style="color: #ffffff;">Sucursal</h4>
                        <select class="input100" type="text" name="sucursal_us" id="sucursal_us" placeholder="Sucursal" style="color: black">
                          <option value="LA JOYA">LA JOYA</option>
                          <option value="LAS FUENTES">LAS FUENTES</option>
                          <option value="LAS BRISAS">LAS BRISAS</option>
                          <option value="REAL SFCO">REAL SFCO</option>
                          <option value="TECATE">Tecate</option>
                        </select>
                        
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="foto_us" id="foto_us" placeholder="Ingresa La Direccion De la Foto">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <input type="hidden" name="registrarse" value="registrarse">

                    <div class="container-login100-form-btn">
                    
                        <span class="login100-form-btn" id="registrarNuevo">Registrar</span>
                    </div>

                   <div style="text-align: right;">
                        <a href="index.php" class="btn btn-default">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombre_us').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el nombre");
				return false;
			}else if($('#puesto_us').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el puesto");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el password");
				return false;
			}
			else if($('#nivel_us').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el nivel de usuario");
				return false;
			}
			else if($('#sucursal_us').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar la sucursal");
				return false;
			}
			else if($('#foto_us').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar la direccion de la foto");
				return false;
			}
			

			cadena="nombre_us=" + $('#nombre_us').val() +
					"&puesto_us=" + $('#puesto_us').val() +
					"&usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val() +
					"&nivel_us=" + $('#nivel_us').val() +
					"&sucursal_us=" + $('#sucursal_us').val() +
					"&foto_us=" + $('#foto_us').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

