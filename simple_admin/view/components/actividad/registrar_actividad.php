<?php
	include_once 'model/actividad.php';
	include_once 'model/actividadDet.php';

	$act = new Actividad();
	$actDet = new ActividadDet();

	include_once 'form_actividad.php'; 
?>
<?php 
	// Variables para validar si se manda información 
	$cveAct = "";
	$desAct	= "";
	$keyUser = 0;
	$keyPro = 0;
	$status = "";
	$fechaIni = "";//date("DD/MM/YYYY");
	$fechaFin = "";//date("DD/MM/YYYY");
	// Se valida que el post manda información y el tipo de dato
	if (isset($_POST['cve_act']) && is_string($_POST['cve_act'])) {
		$cveAct = $_POST['cve_act'];
		echo $cveAct;
	}else{
		$cveAct = "";
	}
	if (isset($_POST['desc_act']) && is_string($_POST['desc_act'])) {
		$desAct = $_POST['desc_act'];
		echo $desAct;
	}else{
		$desAct = "";
	}
	/*if (isset($_POST['key_user']) && is_numeric($_POST['key_user'])) {
		$keyUser = $_POST['key_user'];
		echo $keyUser;
	}else{
		$keyUser = 0;
	}*/
	if (isset($_POST['key_pro']) && is_numeric($_POST['key_pro'])) {
		$keyPro= $_POST['key_pro'];
		echo $keyPro;
	}else{
		$keyPro = 0;
	}
	if (isset($_POST['status']) && is_string($_POST['status'])) {
		$estatus = $_POST['status'];
		echo $estatus;
	}else{
		$estatus = "";
	}
	if (isset($_POST['fecha_ini']) && is_string($_POST['fecha_ini'])) {
		$fechaIni = $_POST['fecha_ini'];
		echo $fechaIni;
	}else{
		$fechaIni = "";
	}
	if (isset($_POST['fecha_fin']) && is_string($_POST['fecha_fin'])) {
		$fechaFin = $_POST['fecha_fin'];
		echo $fechaFin;
	}else{
		$fechaFin = "";
	}
	//Vía método POST
	if($_POST){
		// llena el objeto act con los valores de la pantalla
		$act->setCveAct($cveAct);
		$act->setDescAct($desAct);
		// Llena el objeto actDet con los valores de la pantalla
		$actDet->setKeyUser($keyUser);
		$actDet->setKeyPro($keyPro);
		$actDet->setEstatus($estatus);
		$actDet->setFechaIni($fechaIni);
		$actDet->setFechaFin($fechaFin);


		// General la insercion del dato
		// Notifica la respuesta valida o invalida
		if($act ->insert()){

			echo "<div class='alert alert-success'><h1></h1>Guardado</div>";
		}else {
			echo "<div class='alert alert-danger'><h1></h1>Error</div>";
		} // end if endidad -> insert*/
	}// end if post
?>