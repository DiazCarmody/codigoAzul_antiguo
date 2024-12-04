<?php
// require_once('../logica/main.php');
$conexion=conectar();
$listaPacientes=$conexion->query("SELECT * FROM pacientes INNER JOIN enfermero ON pacientes.id_enfermero = enfermero.enfermero_id INNER JOIN habitaciones ON pacientes.id_habitacion = habitaciones.habitacion_id;");
$listaPacientes=$listaPacientes->fetchAll();
?>
<main>
	<h1>Lista de pacientes</h1>
	<table class="tabla">
		<thead> 
			<tr>
				<th>nombre</th> <th>apellido</th> <th>edad</th><th>domicilio</th><th>datos médicos</th>
				<th>fecha de ingreso</th><th>enfermero a cargo</th> <th>habitación</th>
			</tr>
		</thead>
		<?php foreach ($listaPacientes as $datos) {
			echo'
			<tr>'.
				'<td> <p>'.$datos['paciente_nombre'].'</p> </td>'.
				'<td> <p>'.$datos['paciente_apellido'].'</p> </td>'.
				'<td> <p>'.$datos['paciente_edad'].'</p> </td>'.
				'<td> <p>'.$datos['paciente_domicilio'].'</p> </td>'.
				'<td> <p>'.$datos['paciente_datosmedicos'].'</p> </td>'.
				'<td> <p>'.$datos['paciente_fechaIngreso'].'</p> </td>'.
				'<td> <p>'.$datos['enfermero_nombre'].' '.$datos['enfermero_apellido'].'</p> </td>'.
				'<td> <p>'.$datos['habitacion_nombre'].'</p> </td>'.
			'</tr>';
		}?>
		<button class="generarpdf" onclick="location.href='./lista2.php'">GENERAR PDF
	</table>
</main>