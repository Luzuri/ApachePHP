<?php
    session_start();
    require '../require/conexion.php';
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../estilos/index.css"/>
        <title>Proyecto Unai</title>
    </head>
    <body>
        <div id="contenedor">
            <header>
            <h3>Proyecto Unai</h3>
            <img id="logo" src="../imagenes/docker-logo.png">
            </header>
	    <nav id="navcontainer">
                    <ul id="navlist">
                        <li id="active"><a href="../index.php">Inicio</a></li>
                        <li><a href="consulta.php">Consultar</a> </li>
                        <li><a href="inserccion.php">Insertar</a> </li>
                        <li><a href="actualizacion.php" id="current">Actualizar</a> </li>
                        <li><a href="eliminacion.php">Eliminar</a> </li>
                    </ul>
                </nav>
                <section id="cuerpo">
                        <?php
                                echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
                                        echo "<p><label>ID usuario: </label><input id='nombre' type='text' name='ID' required></p>";
					echo "<p><label>Nombre del usuario: </label><input id='nombre' type='text' name='nombre' required></p>";
					echo "<p><label>Primer apellido: </label><input id='nombre' type='text' name='ap1' required></p>";
					echo "<p><label>Segundo apellido: </label><input id='nombre' type='text' name='ap2' required></p>";
					echo "<p><label>Tipo de Usuario: </label><input id='nombre' type='text' name='tip' required></p>";
					echo "<p><label>ID de Clase: </label><input id='nombre' type='text' name='clas' required></p>";
                                        echo "<p><input type='submit' name='boton' value='Acceder'></p>";
                                echo "</form>";
				$db=conectaBD();
   				$actu="update usuarios set nombre='".$_REQUEST["nombre"]."', apellido1='".$_REQUEST["ap1"]."', apellido2='".$_REQUEST["ap2"]."', tipo_usuario='".$_REQUEST["tip"]."', tipo_usuario='".$_REQUEST["tip"]."' where id_clase='".$_REQUEST['clas']."'";
				 $num_filas=$db->exec($actu); 
				 if ($num_filas===false){
			         	$error=$db->errorInfo();
			        	 echo "Error en la consulta. Error ". $error[2];
				 }else {
				         echo "El registro se ha actualizado de forma correcta ";
				 }
                        ?>		
                </section>
        </div>
    </body>
</html>
