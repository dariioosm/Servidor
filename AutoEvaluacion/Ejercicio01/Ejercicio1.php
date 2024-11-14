<?php
/*
*Crear un formulario que contenga una matriz de 2x3 y un botón de calcular como se puede ver en la figura. 
*Para crear el formulario se han de utilizar bucles, el formulario solo ha de contener una etiqueta, una caja de texto y un botón. 
*El ejercicio se resolverá en un único fichero llamado ejercicio1.php, en la primera ejecución se mostrará el formulario y en la recarga una vez pulsado el botón se mostrará el resultado
*/




    //TODO hacer bucle para generar la matriz
for ($i =0; $i<3;$i++){
    echo '<tr>';
    for($j=0;$j<4;$j++){
        echo'<td>';
        echo"<form action='#' method = 'post'>
        <label>Numero de elementos: </label>
        <input type = 'number' name= 'valor' required/>
        <input type = 'submit' value = 'calcular'>
    </form>";
          
    }
}




?>