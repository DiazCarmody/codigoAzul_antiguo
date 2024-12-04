<?php require_once ('./logica/session.php'); 
require_once ('./logica/main.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./vistas/styles/bulma.min.css">
	<link rel="stylesheet" href="./vistas/styles/formstyle.css">
	<link rel="stylesheet" href="./vistas/styles/style.css">
    <link rel="icon" href="./vistas/styles/images/icon.png">
	<title>Principal || Código Azul</title>
</head>
<body class="body">
	<?php
	if (!isset($_GET['vista']) || $_GET['vista']=="") {
	 	$_GET['vista']="login";
	 } 
	if (is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404") {
		include("./reciclar/navbar.php");
		include("./vistas/".$_GET['vista'].".php");
		include("./reciclar/script.php");
	} else {
		if ($_GET['vista']=="login") {
			include("./vistas/iniciarSesion.php");
			// include("./reciclar/script.php");
		} else {
			include("./vistas/404.php");		}
		
	}
	
	?>


	<!-- <?php// include_once('./reciclar/navbar.php'); ?> -->
	<!-- <?php// include_once('./reciclar/script.php'); ?> -->
</body>

</html>