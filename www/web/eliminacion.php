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
                        <li><a href="actualizacion.php">Actualizar</a> </li>
                        <li><a href="eliminacion.php" id="current">Eliminar</a> </li>
                    </ul>
                </nav>               
		<section id="cuerpo">
			<?php	
				echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
                                        echo "<p><label>ID usuario: </label><input id='nombre' type='text' name='ID' required></p>";
                                        echo "<p><input type='submit' name='boton' value='Acceder'></p>";
                                echo "</form>";
				$db=conectaBD();
			        $consulta="delete from usuarios where id_usuariois='".$_REQUEST["ID"]."'";
        			$num_filas=$db->exec($consulta);
	        		if ($num_filas===false) {
	        		    $error=$db->errorInfo();
			            return "Error en la consulta. Error ". $error[2];
        			} else echo "Registro borrado de forma correcta";			
			?>
                </section>
        </div>
    </body>
</html>
