<?php
	/**
	 * 
	 */

	class MainController {

		public function index(){
			$page_title = 'Bienvenidos';
			require_once 'view/layout/layout_header.php';
			require_once 'view/layout/layout_footer.php';
		}

		public function main(){
			$page_title = 'Principal';
			require_once 'view/layout/layout_main.php';
			require_once 'view/layout/layout_footer.php';
		
		}

		public function proyectNav(){
			$page_title = 'Proyectos';
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/general/nav_proyectos.php';
			require_once 'view/layout/layout_footer.php';
		}

		public function reporteXlsx(){
			$page_title = 'Reportes en excel';
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/general/nav_proyectos.php';
			require_once 'view/layout/layout_footer.php';
		}
		public function reportePdf(){
			$page_title = 'Reportes en Pdf';
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/general/nav_proyectos.php';
			require_once 'view/layout/layout_footer.php';
		}
	}
?>