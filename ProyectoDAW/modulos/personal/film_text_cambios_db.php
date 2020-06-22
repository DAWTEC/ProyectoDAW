<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TEXTO DE FILM CAMBIOS</title>


    <script src="../../includes/js/jquery-3.5.1.js"></script>
    <script src="../../includes/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../includes/css/jquery-ui.min.css">    
    <link rel="stylesheet" type="text/css" href="../../includes/css/general.css">    
    <link rel="stylesheet" type="text/css" href="../../includes/css/grid.css">       
    <script>
        $(document).ready(function () {
            
            $('#mensaje').dialog({
                autoOpen: false,
                resizable: true,
                width: 600,
                height: 400,
                modal: true,
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },
                buttons: {
                    "Modificar Otra Texto de Film": function () {
                        $("#mensaje").dialog("close");
                        location      = 'film_text_cambios.php';
                    },
                    "Ir a Principal" : function(){
                        $("#mensaje").dialog("close");
                        location      = 'film_text_cambios.php';
                    }
                }
            });
        });
    </script>




    <?php
        include "../../includes/php/conexion.php";
        //La  variable de conexion se llama $conexion
        include "../../includes/php/funciones.php";

        $id  = validar($_POST['enviar']);
        $titulo = validar($_POST['nuevo_titulo']);
        $texto = validar($_POST['texto']);
    ?>
</head>    
<body>
<?php
        try {
            //Crear la consulta
            $sql = "update Sakila.film_text
                    set title   = :titulo,
                        description = :descripcion
                    where film_id = :id";

            $cambios = $conexion->prepare($sql);
            $cambios->bindParam(':titulo' , $titulo);
            $cambios->bindParam(':descripcion' , $texto);
            $cambios->bindParam(':id'     , $id);

            $cambios->execute();
    ?>
            <script>
                $(document).ready(function () {
                    $("#mensaje").html("<h1>TEXTO DE FILM MODIFICADO CON EXITO</h1>");
                    $("#mensaje").dialog("open");    
                });
            </script>
    <?php
        } catch(PDOException $e) {
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
          
        $conexion = null;
    ?>
    <div id='mensaje' title='TITULO DE LA CAJA DE DIALOGO'>   </div>    

    </body>
</html>