<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CATEGORIA BAJA</title>

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
    <h2>Baja de Categoria</h2>
    <form action="categoria_baja_db.php" method="post">
    <label for="nombre">Nombre</label>
    <select name="id_categoria" id="id_categoria">
        <?php echo $combobit; ?>    
    </select>
    <button>Enviar</button>
    </form>
</body>
</html>