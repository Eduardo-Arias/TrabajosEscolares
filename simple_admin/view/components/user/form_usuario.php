<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="media/css/registrar.css">
</head>
<body background="media/image/fondo.jpg">
	 <div class="container">
		<div class="jumbotron boxregistrar" >
			<form action="" method="post">
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Usuario" required>
				<label for="ape_pat">Apellido Paterno:</label>
				<input type="text" id="ape_pat" name="ape_pat" class="form-control" placeholder="Apellido Paterno" required>
				<label for="ape_mat">Apellido Materno:</label>
				<input type="text" id="ape_mat" name="ape_mat" class="form-control" placeholder="Apellido Materno">
				<label for="email">Correo Electronico:</label>
				<input type="email" id="email" name="email" class="form-control" placeholder="nombre@ejemplo.com">
				<label for="username">Nombre de usuario:</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required>
				<label for="pass">Contraseña:</label>
				<input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña">
				<button class="btn btn-primary" id="enviar">Registrar</button>		
			</form>
		</div>
	</div>
</body>
</html>