<?php include ('../logica/session.php');
include('../logica/main.php');
$id_cargo=$_SESSION['cargo'];
if($id_cargo!=1){
	header('Location:./generico.php');
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./styles/formstyle.css">
	<link rel="icon" href="./styles/images/icon.png">
	<link rel="stylesheet" href="./vistas/styles/bulma.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
	<title>Código azul | Crear area</title>
</head>
<body>

	<div class="formareas">

		<h1>Crear area</h1>
		<div class="form-rest"></div>
		<form action="../logica/crearArea.php" method="POST" class="FormularioAjax">
			<input class="input" type="text" name="area_nombre" placeholder="Nombre del area" required>
			<input type="submit" value="crear" class="inputcrear">
		</form>
	</div>
	<?php include('../reciclar/script.php'); ?>
</body>
</html>