<?php
require_once('./main.php');
$nombreArea=limpiarString($_POST['area_nombre']);
$conexion=conectar();
$checkArea=$conexion->query("SELECT * FROM areas WHERE area_nombre ='$nombreArea';");
if($checkArea->rowCount()==1){
	echo'
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../vistas/styles/style.css">
	</head>
		<div class="error-message">
  			<span class="error-icon">!</span>
  			<p>Se ha producido un error. Esta área ya existe.</p>
		</div>
	';
}else{
	$registrarArea=$conexion;
	$registrarArea=$registrarArea->prepare("INSERT INTO areas values(null, :nombreArea)");
	$arrayarea=[':nombreArea'=>$nombreArea];
	$registrarArea->execute($arrayarea);
	if ($registrarArea->rowCount()==1) {
	echo'
		<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../vistas/styles/style.css">
	</head>
		<div class="error-message">
  			<!--<span class="error-icon">!</span>-->
  			<p>¡Área registrada con éxito!</p>
		</div>
	';		
	}
}
?>