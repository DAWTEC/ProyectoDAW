<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ACTIVAR CLIENTES</title>

<?php
    include "../../includes/php/conexion.php";
    $sql="SELECT * from sakila.customer";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    
        $combobit="";
        while ($row = $consulta->fetch()){ 

        $combobit .=" <option value='".$row['customer_id']."'>".$row['first_name']." ".$row['last_name']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
        }

?>

</head>
<body>
    <h2>Activar Cliente</h2>
    <form action="clientes_activar_db.php" method="post">
    <label for="nombre">Nombre</label>
    <select name="id_cliente" id="id_cliente">
        <?php echo $combobit; ?>    
    </select>    
    <button>Enviar</button>
    </form>
</body>
</html>