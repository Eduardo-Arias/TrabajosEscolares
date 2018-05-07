<?php
    session_start();
  require_once 'config/dataBase.php';
  //Para registrar productos es necesario iniciar los proveedores
  //de los mismos, por ello la variable controller para este
  //ejercicio se inicia con el '´pantallaPrincipal'.
  //$controller = 'pantallaPrincipal';
  $controller = 'main';
  // Todo esta lógica hara el papel de un FrontController
  if(!isset($_REQUEST['c']))
  {
    //Llamado de la página principal

      /*Contrusccion de la ruta de la clase controlador*/
    require_once "controller/$controller.controller.php"; 
      /* Contruccion de la clase controlador */
    $controller = ucwords($controller) . 'Controller';
      /* Instancia de la clase controlador */
    $controller = new $controller;    
    /* Accede al metodo Index para mostrar la pagina principal */
    $controller->index();
  }
  else
  {
    // Obtiene el controlador a cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // Instancia el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
  }
?>