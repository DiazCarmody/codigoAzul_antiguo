<?php
require_once('./main.php');
$nombreHabitacion=$_POST['habitacion_nombre'];
$area=$_POST['id_area']; 
$conexion=conectar();
$check_habitacion=$conexion->query("SELECT * FROM habitaciones WHERE habitacion_nombre = '$nombreHabitacion'");
if($check_habitacion->rowCount()>1){
	echo "ESTA HABITACIÓN YA EXISTE";
}else{
	$consulta_asignarHabitacion=$conexion->prepare("INSERT INTO habitaciones(habitacion_id, habitacion_nombre, id_area) VALUES (NULL,:nombreHabitacion,:area)");
	$arrayHabitacion=[
		":nombreHabitacion"=>$nombreHabitacion,
		"area"=>$area
	];
	$consulta_asignarHabitacion->execute($arrayHabitacion);
	$consulta_asignarHabitacion=null;
}
?>