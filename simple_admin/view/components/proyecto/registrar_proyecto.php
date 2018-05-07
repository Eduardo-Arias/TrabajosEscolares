<?php
	include_once 'model/proyecto.php';

	$pro = new Proyecto();

	include_once 'form_proyecto.php'; 
?>
<?php 
	//Vía método POST
	if($_POST){
		// llena los objetos $usuario con los parametros enviados
		$pro->setCvePro($_POST['cve_pro']);
		$pro->setDescPro($_POST['desc_pro']);

		// General la insercion del dato
		// Notifica la respuesta valida o invalida
		if($pro ->insert()){
			echo "<div class='alert alert-success'><h1></h1>Guardado</div>";
		}else {
			echo "<div class='alert alert-danger'><h1></h1>Error</div>";
		} // end if endidad -> insert
	}// end if post
?>