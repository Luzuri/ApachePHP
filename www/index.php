<?php
    session_start();
    require 'require/conexion.php';
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="estilos/index.css"/>
        <title>Proyecto Unai</title>
    </head>
    <body>
        <div id="contenedor">
            <header>
            <h3>Proyecto Unai</h3>
            <img id="logo" src="imagenes/docker-logo.png">
            </header>
                <nav id="navcontainer">
                    <ul id="navlist">
                        <li id="active"><a href="index.php" id="current">Inicio</a></li>
			<li><a href="web/consulta.php">Consultar</a> </li>
                        <li><a href="web/inserccion.php">Insertar</a> </li>
			<li><a href="web/actualizacion.php">Actualizar</a> </li>
			<li><a href="web/eliminacion.php">Eliminar</a> </li>
                    </ul>
                </nav>
                <section id="cuerpo">
			<h1>Esta es la tabla de Unai</h1>
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
							echo "<th>ID_USUARIOS</th>";
							echo "<th>NOMBRE</th>";
							echo "<th>TPO_USUARIOS</th>";
						echo "</tr>";
					foreach ($registros as $fila){
						echo "<tr>";
							echo "<td>".$fila["id_usuarios"]."</td>";
							echo "<td>".$fila["nombre"]."</td>";
							echo "<td>".$fila["tipo_usuario"]."</td>";
								
						echo "</tr>";
					}
					echo "</table>";
					}
				}
			?>
		</section>
        </div>
    </body>
</html>
