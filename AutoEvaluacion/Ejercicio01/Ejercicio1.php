<?php
/*
*Crear un formulario que contenga una matriz de 2x3 y un botón de calcular como se puede ver en la figura. 
*Para crear el formulario se han de utilizar bucles, el formulario solo ha de contener una etiqueta, una caja de texto y un botón. 
*El ejercicio se resolverá en un único fichero llamado ejercicio1.php, en la primera ejecución se mostrará el formulario y en la recarga una vez pulsado el botón se mostrará el resultado
*/
    //TODO primer formulario
    echo"<form action ='#' method = 'post'>";
    echo'<table>';
    for ($i =0; $i<2;$i++){
        
    echo '<tr>';
    for($j=0;$j<3;$j++){
        echo'<td>';
            echo'<label>'.$i.$j.'</label> <input type="number" name="numero'.$i.$j.'" min="1" max="100"></input>';
        echo'</td>';  
        }
    echo'</tr>';
    }
    echo '</table>';
    echo "<input type = 'submit' value = 'calcular'>";    
    echo  "</form> ";

    //TODO hacer comprobacion del envio de formulario
    if(isset($_POST["numero'.$i.$j.'"])){
        echo'<form>';
        echo'<table>';
    for ($i =0; $i<2;$i++){
    echo '<tr>';
    for($j=0;$j<3;$j++){
        echo'<td>';
            echo'<label>'.$i.$j.'</label> <input type="number" name="numero'.$i.$j.'" min="1" max="100"></input>';
        echo'</td>';  
        }
    echo'</tr>';
    }
    echo '</table>';
    echo '</form>';
    echo "<input type = 'submit' value = 'calcular'>";
    for($i=0;$i<2;$i++){
        for($j=0;$j<3;$j++){
            echo $_POST["numero'.$i.$j.'"].''. decbin($_POST["numero'.$i.$j.'"]);
        }
    }
    }
?>