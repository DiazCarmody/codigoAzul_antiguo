<?php
ob_start();
require_once('../logica/main.php');
$conexion=conectar();
$listaPacientes=$conexion->query("SELECT * FROM pacientes INNER JOIN enfermero ON pacientes.id_enfermero = enfermero.enfermero_id INNER JOIN habitaciones ON pacientes.id_habitacion = habitaciones.habitacion_id;");
$listaPacientes=$listaPacientes->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>listaDePacientes</title>
</head>
<body class="body">
	<h1>Lista de pacientes</h1>
	<!-- border="2" class="tabla" style="width: 60%; text-align: justify;" -->
	<table border="1" style="column-gap: 5px;">
		<thead> 
			<tr><th>nombre</th> <th>apellido</th> <th>edad</th><th>domicilio</th><th>datos médicos</th>
				<th>fecha de ingreso</th><th>enfermero a cargo</th> <th>habitación</th></tr>
		</thead>
		<?php foreach ($listaPacientes as $datos){
			echo'
			<tr>'.
				'<td>'.$datos['paciente_nombre'].'</td>'.
				'<td>'.$datos['paciente_apellido'].'</td>'.
				'<td>'.$datos['paciente_edad'].'</td>'.
				'<td>'.$datos['paciente_domicilio'].'</td>'.
				'<td>'.$datos['paciente_datosmedicos'].'</td>'.
				'<td>'.$datos['paciente_fechaIngreso'].'</td>'.
				'<td>'.$datos['enfermero_nombre'].' '.$datos['enfermero_apellido'].'</td>'.
				'<td>'.$datos['habitacion_nombre'].'</td>'.
			'</tr>';
		}?>
	</table>
</body>
</html>
<?php
$html=ob_get_clean();
//echo $html;
require_once('../librerias/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("archivo_listaDePacientes.pdf", array("attachment" => false));
?>