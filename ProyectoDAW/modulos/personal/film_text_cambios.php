<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TEXTO DEL FILM CAMBIOS</title>
<script src="../../includes/js/jquery-3.5.1.js"></script>
<?php
    include "../../includes/php/conexion.php";
    $sql="SELECT * from sakila.film_text";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    
        $combobit="";
        while ($row = $consulta->fetch()){ 

        $combobit .=" <option value='".$row['film_id']."'>".$row['title']."</option>"; //concatenamos en los options para luego ser insertado en el HTML
        }

?>

    <script>
    $(document).ready(function () {
        
        $("#seleccionar").click(function(){
            $('#id_film').prop('disabled', 'disabled');
            var id_film = $("#id_film").val();
            preparar(id_film);
            
        });
        function preparar(id){
            var parametros = {
                "id_film": id
            };
            $.ajax({
                data: parametros,
                url: "film_text_cambios_ajax.php",
                type: "post",
                beforeSend: function(){
                    alert("Procesando, espere");
                },
                success: function(response){
                    $("#seleccionar").after(response);
                }
            });
        }
    });

    </script>
</head>
<body>
    <h2>Modificacion del texto de film</h2>
    
    <label for="nombre">Nombre</label>
    <select name="id_film" id="id_film">
        <?php echo $combobit; ?>    
    </select>
    <button id="seleccionar">Seleccionar</button>
    
</body>
</html>