<?php
$serverName = "127.0.0.1"; //IP del servidor de MySQL o bien localhost
$userName = "root"; //Usario de la Base de Datos
$pass = "root"; //Password del usuariode la Base de Datos

//En la línea 10 sakila es el nombre de la base de datos a la que se quiere conectar  
try{
    //si el SMBD MySQL esta instalado en otro servidor distinto debemos poner la ip correspondiente
    //$dsn="mysql:host=10.145.20.21;dbname=sakila;port=3306";
    $dsn="mysql:host=127.0.0.1;dbname=Sakila;port=3306";
    $conexion = new PDO($dsn,$userName, $pass);
        
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Mensaje de la excepción: ".$e->getMessage()."<br>";
    echo "Excepción previa (para posibles seguimientos): ".$e->getPrevious()."<br>";
    echo "Código de la excepción: ".$e->getCode()."<br>";
    echo "Script causante de la excepción: ".$e->getFile()."<br>";
    echo "Línea causante de la excepción: ".$e->getLine()."<br>";
    echo "Cadena informativa de la excepción: ".$e->__toString()."<br>";

    //CUANDO LA APLICACION YA LA TENGAMOS EN PRODUCCION ELIMINAR TODOS ESTOS MENSAJES 
    //Y REDIRECCIONAR A UNA PAGINA DE ERROR EN LA CUAL NO SE INFORME AL USUARIO
    //FINAL CUAL ES EL MOTIVO DEL ERROR. 
    //UNICAMENTE DECIRLE QUE LA PAGINA NO ESTA DISPONIBLE EN ESTE MOENETIOUNA PAGINA 

    //echo "<script> location      = '../../error.html';  </script>";

}


?>
