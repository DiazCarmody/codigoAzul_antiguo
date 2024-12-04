<?php
// require_once('../logica/session.php');
$id_cargo=$_SESSION['cargo'];
if ($id_cargo==3 || !isset($_SESSION['cargo'])) {
 	 header('Location:./generico.php');
 	echo'
 	<div>
 	 	USTED NO TIENE ACCESO
 	 </div> 
 	';
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../vistas/styles/formstyle.css">
	<link rel="stylesheet" href="./vistas/styles/bulma.min.css">
	<title>Document</title>
</head>
<body>
	<div class="formenfermero">
		<img src="./styles/images/icon.png" width="50px" height="50px">
		<h1>Habilitar enfermero</h1>
		<div class="form-rest"></div>
		<form action="../logica/habilitarEnfermeroLogica.php" method="POST" class="FormularioAjax">
			<input type="text" name="enfermero_nombre" placeholder="Nombre del enfermero" required>
			<input type="text" name="enfermero_apellido" placeholder="Apellido del enfermero" required>
			<input class="inputhabilitar" type="submit" value="habilitar">		
	</form>
	</div>
		<?php include('../reciclar/script.php'); ?>
</body>
</html>