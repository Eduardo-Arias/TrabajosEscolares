<?php
	include_once 'model/usuario.php';

	$usuario = new Usuario();

	include_once 'form_usuario.php';
?>
<?php 
	//Vía método POST
	if($_POST){
		// llena los objetos $usuario con los parametros enviados
		$usuario->setNombre($_POST['nombre']);
		$usuario->setApePat($_POST['ape_pat']);
		$usuario->setApeMat($_POST['ape_mat']);
		$usuario->setUsername($_POST['username']);
		$usuario->setPass($_POST['pass']);
		$usuario->setEmail($_POST['email']);

		// General la insercion del dato
		// Notifica la respuesta valida o invalida
		if($usuario ->insert()){
			$usuario->enviarEmail($usuario->getNombre(),$usuario->getEmail());
			echo "<div class='alert alert-success'><h1></h1>Correcto</div>";
		}else {
			echo "<div class='alert alert-danger'><h1></h1>Error</div>";
		} // end if endidad -> insert
	}// end if post
?>