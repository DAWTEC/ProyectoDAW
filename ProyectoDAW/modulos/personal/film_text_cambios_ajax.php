<?php 
$id = $_POST['id_film']; 

include "../../includes/php/conexion.php";
    $sql="SELECT * from sakila.film_text where film_id = ".$id."";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $row = $consulta->fetch();
?>
<script src="../../includes/js/jquery-3.5.1.js"></script>

<form action="film_text_cambios_db.php" method="post">
    
    <label for="nuevo_titulo">Nuevo Titulo</label>
    <input type="text" id="nuevo_titulo" name="nuevo_titulo" value="<?php echo $row['title'];?>">
    <label for="textarea">Texto </label>
    <textarea type="textarea" id="texto" name="texto" rows="10" cols="50"><?php echo $row["description"]?></textarea>
    <button id="enviar" name="enviar" value="<?php echo $id?>">Enviar</button>
    </form>