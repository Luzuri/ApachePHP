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
                <nav>
                    <ul>
                        <li><a href="../index.php">Inicio</a></li>
			<li><a href="consulta.php">Consultar</a> </li>
                        <li><a href="inserccion.php">Insertar</a> </li>
			<li><a href="actualizacion.php">Actualizar</a> </li>
			<li><a href="eliminacion.php">Eliminar</a> </li>
                    </ul>
                </nav>
                <section id="cuerpo">
			<?php
				$db=conectaBD();
                                $consulta="select * from usuarios";
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
	        		                        echo "<td>apellido1</td>";
							echo "<td>apellido2</td>";
                                                        echo "<td>tipo_usuario</td>";
                                                        echo "<td>id_clase</td>";
        	                	        echo "</tr>";
                                		foreach ($registros as $fila){
			                                echo "<tr>";
        	        			                echo "<td>".$fila["id_usuarios"]."</td>";
				                                echo "<td>".$fila["nombre"]."</td>";
                        			        	echo "<td>".$fila["apellido1"]."</td>";
								echo "<td>".$fila["apellido2"]."</td>";
                                                                echo "<td>".$fila["tipo_usuario"]."</td>";
                                                                echo "<td>".$fila["id_clase"]."</td>";
		                                	echo "</tr>";
						}
					echo "</table>";
					}
				}                                	
			?>
                </section>
            <footer>
            </footer>
        </div>
    </body>
</html>
