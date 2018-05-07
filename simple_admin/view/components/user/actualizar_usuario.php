<?php
	include_once 'model/usuarioDaoImp.php';
	// Obtien el id de la endada a mostrar

	//$id = isset ($_GET['id'])?$_GET['id']:die('ERROR: missing ID.');
	$id = 1;
	$usuario = new UsuarioDaoImp();
	$usuario->readId($id);
	// establece el titulo de la página
	$page_title = "Modificar Usuario";
?>
<!-- Forma a modificar el registro entidad -->
<div class="container">
	<div class="jumbotron boxregistrar" >
		<form action="" method="post">
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" class="form-control" readonly value="<?php echo $usuario->getNombre();?>">
			<label for="ape_pat">Apellido Paterno:</label>
			<input type="text" id="ape_pat" name="ape_pat" class="form-control" readonly value="<?php echo $usuario->getApePat();?>">
			<label for="ape_mat">Apellido Materno:</label>
			<input type="text" id="ape_mat" name="ape_mat" class="form-control" readonly value='<?php echo $usuario->getApeMat();?>'>
			<label for="email">Correo Electronico:</label>
			<input type="email" id="email" name="email" class="form-control" readonly value="<?php echo $usuario->getEmail();?>">
			<label for="username">Nombre de usuario:</label>
			<input type="text" id="username" name="username" class="form-control" required value="<?php echo $usuario->getUsername();?>">
			<label for="pass">Contraseña:</label>
			<input type="password" id="pass" name="pass" class="form-control" 
			required value="<?php echo $usuario->getPass();?>">
			<br>
			<button class="form-groud btn btn-primary" id="enviar" type="submit">Salvar</button>	
		</form>
	</div>
</div>
<!-- Procesar la información -->
<?php 
	if ($_POST){
		//llena el objeto $entidad con los parametros enviados
		$usuario->setPass($_POST['pass']);
		$usuario->setUsername($_POST['username']);
		
		if ($usuario->update()){
			echo "<div class='alert alert-success'>Usuario modificado existosamente.</div>";
		}else {
			echo "<div class='alert alert-danger'>No es posible modificar los datos del usuario</div>";
		}
	}
?>