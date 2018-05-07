<?php
/**
 * 
 */
class PuestoController{
	
	public function insertPuesto(){
		require_once 'view/layout/layout_main.php'
		require_once 'view/components/puesto/registrar_puesto.php';
		require_once 'view/layout/layout_footer.php';
	}

	public function listPuesto(){
		require_once 'view/layout/layout_main.php'
		require_once 'view/components/puesto/listar_puesto.php';
		require_once 'view/layout/layout_footer.php';
	}
}