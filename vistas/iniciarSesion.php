<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<title>Código azul | Ingresar</title>
</head>
<body> -->

	<div class="contenedorformulario">
        <form action="../logica/login.php" method="POST" class="FormularioAjax">

            <img src="./styles/images/icon.png" alt="logo" class="formicon">
            <h1>Iniciar sesión</h1>
            <div class="form-rest"></div>
            <fieldset>
                <legend>Datos de usuario</legend>
                <input type="text" name="username_usuario" placeholder="Nombre" required>

                <input type="password" name="clave_usuario" placeholder="Contraseña" required> 

                <input type="submit" class="submit" value="INGRESAR">

            </fieldset>
        <?php
        if (isset($_POST['username_usuario']) && isset($_POST['clave_usuario'])){
            require_once('../logica/main.php');
            require_once('../logica/login.php');
        }
        ?>
        </form>
    </div>
<!-- </body>
</html> -->