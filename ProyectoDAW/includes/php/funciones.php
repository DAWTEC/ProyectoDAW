<?php
function validar($dato){
    //La funcion trim elimina:
    /*  " " (ASCII 32 (0x20)), espacio simple.
        "\t" (ASCII 9 (0x09)), tabulación.
        "\n" (ASCII 10 (0x0A)), salto de línea.
        "\r" (ASCII 13 (0x0D)), retorno de carro.
        "\0" (ASCII 0 (0x00)), el byte NUL.
        "\x0B" (ASCII 11 (0x0B)), tabulación vertical.
    */    
    $dato = trim($dato);

    //La funcion stripslashes
    /*
            Devuelve un string con las barras invertidas retiradas. 
            (\' se convierte en ') 
            Barras invertidas dobles (\\) se convierten en una sencilla (\).
    */
    $dato = stripslashes($dato); 

    /* strip_tags  Elimina etiquetas */
    $dato = strip_tags($dato);

    /*htmlspecialchars  Convierte caracteres especiales en entidades HTML*/
    $dato = htmlspecialchars($dato);

    return $dato;
}


// MAS FUNCIONES

?>