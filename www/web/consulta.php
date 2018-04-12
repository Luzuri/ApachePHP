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
                        <li><a href="consulta.php" id="current">Consultar</a> </li>
                        <li><a href="inserccion.php">Insertar</a> </li>
                        <li><a href="actualizacion.php">Actualizar</a> </li>
                        <li><a href="eliminacion.php">Eliminar</a> </li>
                    </ul>
                </nav>
		<section id="cuerpo">
			<?php 				
				echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
					echo "<p><label>Nombre del usuario: </label><input id='nombre' type='text' name='nombre' required></p>";
					echo "<p><input type='submit' name='boton' value='Acceder'></p>";
				echo "</form>";
				if ( isset( $_REQUEST['nombre'] ) ) {
	                        	$db=conectaBD();
	         	                $consulta="select id_usuarios, nombre, tipo_usuario from usuarios where nombre='".$_REQUEST["nombre"]."'";
	                                $registros = $db->query($consulta);
	                                if (!$registros) {
        	                   		$error=$db->errorInfo();
	                	                print "<p>Error en la consulta. Error ". $error[2] ."</p>";
                        	        } else {
                                		if ($registros->rowcount()==0) echo "No hay registros";
                                    		else{
							echo "<table>";
				                       		echo "<tr>";
		        	        		                echo "<td>ID_USUARIOS</td>";
			        		                	echo "<td>NOMBRE</td>";
									echo "<td>TPO_USUARIOS</td>";
				        	                echo "</tr>";
	                                        	foreach ($registros as $fila){
        	                                		echo "<tr>";
                	                                		echo "<td>".$fila["id_usuarios"]."</td>";
			        	                                echo "<td>".$fila["nombre"]."</td>";
	                                                                echo "<td>".$fila["tipo_usuario"]."</td>";
					         	        echo "</tr>";                                        
                	                	        }}}
						echo "</table>";
				}
			?>
        </div>
    </body>
</html>
