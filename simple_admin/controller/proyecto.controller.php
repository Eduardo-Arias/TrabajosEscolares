<?php
	/**
	 * 
	 */
	class ProyectoController{
		
		public function insertProyecto(){
			$page_title = "Registrar Proyecto";
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/proyecto/registrar_proyecto.php';
			require_once 'view/layout/layout_footer.php';
		}
		public function listProyecto(){
			$page_title = "Listar proyectos";
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/proyecto/list_proyectos.php';
			require_once 'view/layout/layout_footer.php';
		}
	}
?>