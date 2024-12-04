<?php
$id_cargo=$_SESSION['cargo'];
if ($id_cargo==3 || !isset($_SESSION['cargo'])) {
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
	<title>Código azul | Pacientes</title>
</head>
<body>
	<div class="contenedorformulario">
		<form action="../logica/ingresarPaciente.php" method="POST" class="pacientesform FormularioAjax">

			<img src="./styles/images/icon.png" alt="logo" class="formicon">
 			<h1>Ingrese un paciente</h1>
 			<div class="form-rest"></div>
			<fieldset>
				<legend>Datos del paciente</legend>
				<input type="text" name="nombre" class="" required placeholder="Nombre">
				<input type="text" name="apellido" class="" required placeholder="Apellido">
				<input type="number" name="edad" class="" required placeholder="Edad">
				<input type="text" name="domicilio" class="" required placeholder="Domicilio">
			</fieldset>
			
			<fieldset class="pacientesfieldset">
				<legend>Datos del hospital</legend>
				<label for="datosmedicos">Datos Médicos</label required>
				<textarea name="datosmedicos" required class="formtextarea"></textarea>
				<select name="opcionEnfermero" class="pacienteselect">
					<option value="ninguno" selected="">Enfermero</option>
				<?php
					require_once('../logica/main.php');
					$consultaDatosEnfermeros="SELECT * FROM enfermero;";
					$conexion=conectar();
					$datosEnfermeros=$conexion->query($consultaDatosEnfermeros);
					$datosEnfermeros=$datosEnfermeros->fetchAll();
					$consultaDatosHabitaciones="SELECT * FROM habitaciones";
					$datosHabitaciones=$conexion->query($consultaDatosHabitaciones);
					$datosHabitaciones=$datosHabitaciones->fetchAll();
					foreach ($datosEnfermeros as $opcionEnfermeros) {
						echo '<option value="'.$opcionEnfermeros['enfermero_id'].'">'.$opcionEnfermeros['enfermero_nombre'].' '.$opcionEnfermeros['enfermero_apellido'].'</option>';
					} 
					?>
				</select>
				<select name="opcionHabitacion" class="pacienteselect">
					<option value="ninguno">Habitación</option>
					<?php
					foreach ($datosHabitaciones as $opcionHabitaciones) {
						echo '<option name="opcionHabitacion" value="'.$opcionHabitaciones['habitacion_id'].'">'.$opcionHabitaciones['habitacion_nombre'].'</option>';
					} 
					?>
				</select>
				<input type="submit" class="submit pacientesubmit">
			</fieldset>
		
		</form>
	</div>
</body>
	<?php include('../reciclar/script.php'); ?>
</html>