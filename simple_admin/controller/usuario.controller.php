<?php
	/**
	 * @Autor: Jorge Eduardo Arias Delgado
	 * @Descripcion:
	 *
	 */
	class UsuarioController{
		
		public function insertUser (){
			$page_title = 'Registrar Usuario';
			require_once 'view/layout/layout_header.php';
			require_once 'view/components/user/registrar_usuario.php';
			require_once 'view/layout/layout_footer.php';
		}

		public function loginUser(){
			//$page_title = 'Iniciar Sesion';
			//require_once 'view/layout/layout_header.php';
			require_once 'view/components/login.php';
			//require_once 'view/layout/layout_footer.php';	
		}

		public function updateUser(){
			$page_title = 'Actualizar Usuario';
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/user/actualizar_usuario.php';
			require_once 'view/layout/layout_footer.php';		
		}

		public function listUser(){
			$page_title = 'Listar Empleados';
			require_once 'view/layout/layout_main.php';
			require_once 'view/components/user/listar_usuarios.php';
			require_once 'view/layout/layout_footer.php';	
		}

		public function logout(){
			require_once 'view/components/logout.php';
		}
	}
