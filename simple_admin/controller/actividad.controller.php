<?php
/**
 * 
 */
class ActividadController{

	public function insertActividad(){
		$page_title = 'Registrar Actividad';
		require_once 'view/layout/layout_main.php';
		require_once 'view/components/general/nav_proyectos.php';
		require_once 'view/components/actividad/registrar_actividad.php';
		require_once 'view/layout/layout_footer.php';
	}
	public function updateActividad(){
		$page_title = 'Actualizar Actividad';
		require_once 'view/layout/layout_main.php';
		require_once 'view/components/actividad/actualizar_actividad.php';
		require_once 'view/layout/layout_footer.php';
	}
	public function listActividad(){
		$page_title = 'Listar Actividades';
		require_once 'view/layout/layout_main.php';
		require_once 'view/components/actividad/list_actividad.php';
		require_once 'view/layout/layout_footer.php';
	}
}