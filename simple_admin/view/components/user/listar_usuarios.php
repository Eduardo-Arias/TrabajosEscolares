<?php
	// Configuración de la base de datos
	
	include_once 'model/usuarioDaoImp.php';

	$usuario = new UsuarioDaoImp();
	
	// Header de la pantalla
	
	$page_title = "Listado de Usuarios";
	
	// Contenido
	$usuario->gridHtml();
	
?>