<!DOCTYPE html>
<html lang="en">
<head>
    <title>ANDROMEDA LOGIN</title>
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

<body style="background-color: gray">
 <div class="limiter">
        <div class="container-login100" style="background-image: url('img/imagenisp.jpeg');">
            <div class="wrap-login100">

                <form class="login100-form validate-form">
                    <span class="login100-form-logo">
                        <img src="img/andromeda_icon.png" width="50px;" style="margin-left: -5px">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in Andromeda
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="usuario" id="usuario" placeholder="USUARIO">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" id="password" placeholder="CONTRAÑA">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <input type="hidden" name="entrar" value="entrar">

                    <div class="container-login100-form-btn">
                        <span class="login100-form-btn" id="entrarSistema">Entrar</span>
                    </div>

                    <!-- <a href="registro.php" class="btn btn-danger">Registro</a> -->

                   
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
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Andromeda Dice","Debes agregar el password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="inicio.php";
							}else{
								alertify.alert("Andromeda Dice","Fallo al entrar :(");
							}
						}
					});
		});	
	});
</script>