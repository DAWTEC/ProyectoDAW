<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio Clientes</title>
<script src="../../includes/js/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){

    });
</script>

    <?php
        //$id_cliente = $_POST("customer_id");
        //$nombre = $_POST("nombre");
        $id_cliente = "600";
        $nombre = "Adrian Mora";
        include "../../includes/php/conexion.php";
        include "../../includes/php/funciones.php";
        $sql="SELECT f.title, r.customer_id, r.rental_id, f.rental_rate, c.name FROM rental r, inventory i, film f , film_category fc, category c where r.inventory_id = i.inventory_id    and i.film_id = f.film_id and f.film_id=fc.film_id and fc.category_id=c.category_id
        and r.customer_id = ".$id_cliente."";
        $consulta_rental = $conexion->prepare($sql);
        $consulta_rental->execute();
        
        $arregloCategoria = array('Action' => 0,
            'Animation' => 0,
            'Children' => 0,
            'Classics' => 0,
            'Comedy' => 0,
            'Documentary' => 0,
            'Drama' => 0,
            'Family' => 0,
            'Foreign' => 0,
            'Games' => 0,
            'Horror' => 0,
            'Music' => 0,
            'New' => 0,
            'Sci-Fi' => 0,
            'Sports' => 0,
            'Travel' => 0);
        while ($row_rental = $consulta_rental->fetch()){ 
            switch($row_rental['name']){
                case "Action":
                    $arregloCategoria['Action']++;
                break;
                case "Animation":
                    $arregloCategoria['Animation']++;
                break;
                case "Children":
                    $arregloCategoria['Children']++;
                break;
                case "Classics":
                    $arregloCategoria['Classics']++;
                break;
                case "Comedy":
                    $arregloCategoria['Comedy']++;
                break;
                case "Documentary":
                    $arregloCategoria['Documentary']++;
                break;
                case "Drama":
                    $arregloCategoria['Drama']++;
                break;
                case "Family":
                    $arregloCategoria['Family']++;
                break;
                case "Foreign":
                    $arregloCategoria['Foreign']++;
                break;
                case "Games":
                    $arregloCategoria['Games']++;
                break;
                case "Horror":
                    $arregloCategoria['Horror']++;
                break;
                case "Music":
                    $arregloCategoria['Music']++;
                break;
                case "New":
                    $arregloCategoria['New']++;
                break;
                case "Sci-Fi":
                    $arregloCategoria['Sci-Fi']++;
                break;
                case "Sports":
                    $arregloCategoria['Sports']++;
                break;
                case "Travel":
                    $arregloCategoria['Travel']++;
                break;
            }
            
            }
            arsort($arregloCategoria);
            $categoriaFavorita= array_key_first($arregloCategoria);
        

        $conexion = null;
    ?>
</head>
<body>

    <h2>Bienvenido <?php echo $nombre; ?></h2>
    <hr>
    <h3>Categoria Favorita: <?php echo $categoriaFavorita; ?></h3>
    <hr>
    <h3>Peliculas rentadas por genero:</h3>
    <?php
        foreach ($arregloCategoria as $key => $val) {
            echo "$key = $val\n";
        }
    ?><br>
    
</body>
</html>