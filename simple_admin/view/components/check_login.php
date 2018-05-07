<?php
session_start();
?>
<?php
	$host_db = "localhost";
	$user_db = "id5299419_jarias";
	$pass_db = "php123";
	$db_name = "id5299419_simple_admin";
	$tbl_name = "usuario";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	$username = $_POST['username'];
	$password = $_POST['pass'];
	 
	$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";

	$result = $conexion->query($sql);

	if (mysqli_num_rows($result) > 0) {
		$row = $resul->fetch();
		$passHasd = password_hash($row['pass'],PASSWORD_DEFAULT);
		if (password_verify($pass,$passHasd)) {
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

			header("Location: ?c=main&a=main");
		} else { 
			header("Location: ?c=main&a=index");
		}
	}
	 mysqli_close($conexion); 
 ?>
