<?php
require_once('../logica/session.php');
if(!isset($_SESSION['cargo'])){
	$id=3;
}else{
	$id=$_SESSION['cargo'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./styles/formstyle.css">
	<link rel="icon" href="./styles/images/icon.png">
	<title>Document</title>
</head>
<body>
	<div class="generico">
		<img src="./styles/images/icon.png" alt="logo" width="30px" height="30px">
		<h1>HOLA GENÉRICO</h1>
		<?php echo("SU ID ES"." ".$id) ?>
	</div>
</body>
</html>