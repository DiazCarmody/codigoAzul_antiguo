<?php include ('../logica/session.php');
include('../logica/main.php');
$id_cargo=$_SESSION['cargo'];
if($id_cargo!=1){
	header('Location:./generico.php');
}
$conexion=conectar();
$consulta_areas=$conexion->query("SELECT * FROM areas;");
$consulta_areas=$consulta_areas->fetchAll();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./styles/formstyle.css">
	<link rel="stylesheet" href="./vistas/styles/bulma.min.css">
	<link rel="icon" href="./styles/images/icon.png">
	<title>asignar Habitación</title>
</head>
<body>

	<div class="formhabitacion">
		<h1>Habilitar Habitación</h1>
		<div class="form-rest"></div>
		<form action="../logica/crearHabitacion.php" method="POST" class="FormularioAjax">
			<input type="text" name="habitacion_nombre" placeholder="Nombre de la habitación" class="input">
			<select name="id_area" class="input">
				<option value="0">ELIJA EL ÁREA</option>
				<?php foreach ($consulta_areas as $rows_areas) {
					echo'<option value="'.$rows_areas['area_id'].'">'.$rows_areas['area_nombre'].'</option>';
				}  
				?>
			</select>
			<input type="submit" value="CREAR" class="input inputcrear">
		</form>
	</div>
</body>
	<?php include('../reciclar/script.php'); ?>
</html>