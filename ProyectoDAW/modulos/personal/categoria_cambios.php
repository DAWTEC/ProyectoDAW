<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CATEGORIA CAMBIOS</title>

<?php
    include "../../includes/php/conexion.php";
    $sql="SELECT * from sakila.category";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    
        $combobit="";
        while ($row = $consulta->fetch()){ 

        $combobit .=" <option value='".$row['category_id']."'>".$row['name']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
        }

?>

</head>
<body>
    <h2>Modificacion de Categoria</h2>
    <form action="categoria_cambios_db.php" method="post">
    <label for="nombre">Nombre</label>
    <select name="id_categoria" id="id_categoria">
        <?php echo $combobit; ?>    
    </select>
    <label for="nuevo_nombre">Nuevo nombre</label>
    <input type="text" id="nuevo_nombre" name="nuevo_nombre">
    <button>Enviar</button>
    </form>
</body>
</html>