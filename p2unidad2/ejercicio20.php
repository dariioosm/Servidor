<?php 
/*
* implementa un array asociativo con los siguientes valores
*/
$estadios_futbol=array(
    "Barcelona"=>"Camp Nou",
    "Real Madrid"=>"Santiago Bernabeu",
    "Valencia CF"=> "Mestalla",
    "Real Sociedad"=>"Anoeta"
);

/*
* Muestra los valores del array en una tabla, has de mostrar el índice y el valor asociado.
* Elimina el estadio asociado al Real Madrid
* Vuelve a mostrar los valores para comprobar que el valor ha sido eliminado, esta vez en una lista numerada
*/
echo"<table>";
foreach($estadios_futbol as $equipo => $campo){
    echo "<tr>";
    echo$equipo;
    echo "<td>".$campo."</td>";
    echo"</tr>";
}
echo"</table>";
?>