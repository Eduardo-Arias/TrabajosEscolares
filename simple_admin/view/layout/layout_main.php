<?php
	if (isset($_SESSION['loggedin']))  {

	}else {
		header("Location: ?c=main&a=index");
		echo "Esta pagina es para ususarios registrados.";

		echo $_SESSION['loggedin'];
		exit;
	}
	$username = $_SESSION['username'];
	$now = time();

	if ($now > $_SESSION['expire']) {
		session_destroy();
		header("Location: ?c=main&a=index");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=divece-width, initical-scale=1">
		<title>Principal</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1">
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
		<link rel="stylesheet" href="media/css/font-awesome.min.css">
	
		
		<!-- Enlace a bootstrap -->
		<link rel="stylesheet" href="media/css/bootstrap.min.css">
		<!-- Enlace a mi estilo -->
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1><?php $page_title?></h1>
			</div>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <a class="navbar-brand" href="#">SimpleAdmin</a>

			  <div class="collapse navbar-collapse" id="navbar">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item active">
			        <a class="nav-link" href="?c=main&a=main">Home</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="dropDownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			     		Proyectos
			        </a>
			        <div class="dropdown-menu" aria-labelledby="dropDownUser">
			          <a class="dropdown-item" href="?c=proyecto&a=insertProyecto">Crear Nuevo</a>
			          <a class="dropdown-item" href="?c=proyecto&a=listProyecto">Listar Proyectos</a>
			        </div>
			     </li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			    </form>

			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="dropDownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			     		<?php echo $username;?>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="dropDownUser">
			          <a class="dropdown-item" href="?c=usuario&a=perfil">Mi perfil</a>
			          <a class="dropdown-item" href="?c=usuario&a=config">Configuración</a>
			          <a class="dropdown-item" href="?c=usuario&a=logout">Cerrar Sesion</a>
			        </div>
			     </li>
			    </ul>
			  </div>
			</nav>
		</div>
	</body>
</html>