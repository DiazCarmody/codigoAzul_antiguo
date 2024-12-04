<?php
// include('../logica/main.php');
$id_cargo=$_SESSION['cargo'];
$conexion=conectar();
$queryCargo=$conexion->query("SELECT * FROM cargo;");
$queryCargo=$queryCargo->fetchAll();
?>
<main class="contenedorformulario">
        <form action="../logica/registrarUsuario.php" method="POST" class="FormularioAjax">

            <img src="./styles/images/icon.png" alt="logo" class="formicon">
            <h1>Registrarte</h1>
            <div class="form-rest"></div>
            <fieldset>
                <legend>Datos de usuario</legend>
                <input type="text" name="usuario_nombre" placeholder="Nombre" required>

                <input type="text" name="usuario_apellido" placeholder="Apellido" required>

                <input type="text" name="username" placeholder="Nombre de usuario" required> 

				<input type="password" name="usuario_clave" placeholder="Contraseña" required> 

            </fieldset>
            <fieldset>
            <?php if(isset($id_cargo)&& $id_cargo=1){
                echo'
                <legend>Rango de usuario</legend>
        
                <input list=”rango” name ="usuario_cargo" placeholder="Rango" required>
                <datalist id=”rango” name=”rango-usuario” >
                    <option value="3" >Genérico</option>
                    <option value="2" >Médico</option>
                    <option value="1" >Administrador</option>
                </datalist>
                ';
            } ?>
                <input type="submit" class="submit" value="REGISTRAR">

            </fieldset>

        </form>
</main>