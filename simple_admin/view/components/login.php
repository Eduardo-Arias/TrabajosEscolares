<?php
    //session_start();
	include_once 'model/usuario.php';
	$user = new Usuario();
?>
<?php
	//Vía método POST
	if($_POST){
		$user->setUsername($_POST['username']);
		$user->setPass($_POST['pass']);

	    if($user->validarUsuario()){
	       header("Location: ?c=main&a=main"); 
	    }else{
	        header("Location: ?c=main&a=index");
	    }
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=divece-width, initical-scale=1">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1">
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
		<link rel="stylesheet" href="media/css/font-awesome.min.css">
	
		
		<!-- Enlace a bootstrap -->
		<link rel="stylesheet" href="media/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="media/css/login.css">
		<!-- Enlace a mi estilo -->
	</head>
	<body background="media/image/fondo.jpg">
		<div class="container">
			<div class="jumbotron boxlogin" >
				<form method="post" id="flogin"  enctype="application/x-www-form-urlencoded">
					<label for="username">Usuario:</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required>

					<label for="pass">Contraseña</label>
			      	<input type="password" id="pass" name="pass" href="?c=main&a=main" class="form-control" placeholder="Contraseña" required>

					<button class="btn btn-primary btn-lg btn-block" href="?c=main&a=main">Iniciar Sesion</button>			
				</form>
			</div><!-- End Jumbontron -->
		</div><!-- End Container -->
	</body>
</html>
