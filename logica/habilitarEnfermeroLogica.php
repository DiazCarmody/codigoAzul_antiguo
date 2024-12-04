<?php
require_once('./main.php');
$nombre=limpiarString($_POST['enfermero_nombre']);
$apellido=limpiarString($_POST['enfermero_apellido']);
$con=conectar();
$queryEnfermero=$con->prepare("INSERT INTO `enfermero`(`enfermero_id`, `enfermero_nombre`, `enfermero_apellido`) VALUES (NULL,:nombre,:apellido)");
$arrayEnfermero=[
":nombre"=>$nombre,
":apellido"=>$apellido
];
$queryEnfermero->execute($arrayEnfermero); 
?>