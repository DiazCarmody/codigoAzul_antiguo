<?php
require_once('./session.php');
require_once('./main.php');
##almaceno los datos
$username=limpiarString($_POST['username_usuario']);
$clave=limpiarString($_POST['clave_usuario']);
if ($username=="" || $clave=="") {
 	echo "
 	<div>
 	<span class=estiloError>DEBE LLENAR TODOS LOS CAMPOS</span>
 	</div>";
	exit(); 
}
$check_user=conectar();
$check_user=$check_user->query("SELECT * FROM usuarios WHERE usuario_username = '$username';");
if ($check_user->rowCount()==1) {
	$check_user=$check_user->fetch();
	if ($check_user['usuario_username']==$username && password_verify($clave,$check_user['usuario_clave'])){
		$_SESSION['id']=$check_user['usuario_id'];
		$_SESSION['username']=$check_user['usuario_username'];
		$_SESSION['cargo']=$check_user['cargo_id'];
	}if (headers_sent()) {
			echo "<script> window.location.href'../logica/index.php';</script>";
		}else {
			$_SESSION['id']=$check_user['usuario_id'];
			$_SESSION['username']=$check_user['usuario_username'];
			$_SESSION['cargo']=$check_user['id_cargo'];
			header("Location:../vistas/admin.php");
		}
	}else {
		echo '
			<div class="error-message">
			<span class="error-icon"><strong>!</strong></span>
			<p>USUARIO O CONTRASEÑA INCORRECTOS</p>
			</div>';
}
?>