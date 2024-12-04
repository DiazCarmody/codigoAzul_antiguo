<?php
// require_once('../logica/session.php');
require_once('../logica/main.php');
$id_cargo=$_SESSION['cargo'];
$username=$_SESSION['username'];
if($id_cargo!=1 && $id_cargo==2){
	header('Location:./medico.php');
}elseif ($id_cargo!=1 && $id_cargo==3) {
	header('Location:./generico.php');
}elseif(!isset($_SESSION['cargo'])){
	$id_cargo=3;
	header('Location:./generico.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./styles/images/icon.png">
	<link rel="stylesheet" href="./styles/formstyle.css">
	<title>Código azul | Admin</title>
</head>
<body>

	<div class="admindiv">
		<h1>HOLA ADMIN</h1>
		<?php
		echo('Su nombre de usuario es '.'<b>'.$username.'</b>');
		?>
		<ul><b>lista de opciones</b>
			<li><a href="./registrarUsuarioForm.php">Registrar usuarios</a></li>
			<li><a href="./ingresarPacienteForm.php">Registrar pacientes</a></li>
			<li><a href="./listaDePacientes.php">Ver lista de pacientes</a></li>
			<li><a href="./habilitarEnfermero.php">Habilitar enfermeros</a></li>
			<li><a href="./crearAreaForm.php">Crear áreas</a></li>
			<li><a href="./crearHabitacionForm.php">Crear habitaciones</a></li>
			<li><button onclick="location.href='../logica/cerrarSesion.php'">Cerrar sesión</button></li>
		</ul>
		<?php } ?>
	</div>
</body>
</html>