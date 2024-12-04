<?php
require_once('./session.php');
require_once('./main.php');
$paciente_nombre=limpiarString($_POST['nombre']);
$paciente_apellido=limpiarString($_POST['apellido']);
$paciente_edad=limpiarString($_POST['edad']);
$paciente_domicilio=limpiarString($_POST['domicilio']);
$datosmedicos=limpiarString($_POST['datosmedicos']);
$id_enfermero=limpiarString($_POST['opcionEnfermero']);
$id_habitacion=limpiarString($_POST['opcionHabitacion']);
$conectar=conectar();
$insertar=$conectar->prepare("INSERT INTO `pacientes`(paciente_nombre, paciente_apellido, paciente_edad,paciente_domicilio, paciente_datosmedicos, id_enfermero, id_habitacion) VALUES (:nombre,:apellido,:edad,:domicilio,:datosmedicos,:id_enfermero,:id_habitacion)");
$arrayDatos=[
	":nombre" => $paciente_nombre,
	":apellido" => $paciente_apellido,
	":edad" => $paciente_edad,
	":domicilio" => $paciente_domicilio,
	":datosmedicos" => $datosmedicos,
	":id_enfermero" => $id_enfermero,
	":id_habitacion" => $id_habitacion
];
$insertar->execute($arrayDatos);
$insertar=null;
?>