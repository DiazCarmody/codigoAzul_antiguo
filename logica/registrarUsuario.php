<?php
require_once('./main.php');
$username=limpiarString($_POST['username']);
$nombre=limpiarString($_POST['usuario_nombre']);
$apellido=limpiarString($_POST['usuario_apellido']);
$clave=limpiarString($_POST['usuario_clave']);
if(!isset($_SESSION['cargo'])){
	$cargo=3;
	}else{
		$cargo=limpiarString($_POST['usuario_cargo']);
	} 
//encripto
$clave=encriptar($clave);
//consulta
$conectar=conectar();
$checkUsername=$conectar->query("SELECT * FROM usuarios WHERE usuario_username = '$username';");
if($checkUsername->rowCount()>0){
	echo'
		<div class="notification is-danger">
  			<button class="delete"></button>
			NOMBRE DE USUARIO NO DISPONIBLE.
		</div>
	';
}else{
	$queryInsertar=$conectar->prepare("INSERT INTO usuarios(usuario_id, usuario_nombre, usuario_apellido, usuario_username, usuario_clave, id_cargo) VALUES (NULL,:nombre,:apellido,:username,:clave,:cargo)");
	$arrayClaves=[
		":nombre"=>$nombre,
		":apellido"=>$apellido,
		":username"=>$username,
		":clave"=>$clave,
		":cargo"=>$cargo
	];
	$queryInsertar->execute($arrayClaves);
	if ($queryInsertar->rowCount()==1) {
		echo '
		<div class="notification is-success">
  			<button class="delete"></button>
			REGISTRADO CON ÉXITO
		</div>
		';
	}else{
		echo "
		<div>
			ERROR
		</div>
		";
	}
	$queryInsertar=null;
}
?>