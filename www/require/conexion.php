<?php 
    require 'constantes.php';
    function conectaBD(){
        try { $db = new
        PDO("mysql:host=".SERVIDOR.";dbname=".BASE.";charset=utf8",USUARIO,CLAVE);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
        $db->setAttribute(PDO::NULL_TO_STRING, true);
        } catch (PDOException $e) {
            die ("<p><H3>No se ha podido establecer la conexión.</p><p>Compruebe
    si está activado el servidor de bases de datos MySQL. </H3></p>\n
    <p>Error: ".$e->getMessage()."</p>\n");}
            return $db;}
?>