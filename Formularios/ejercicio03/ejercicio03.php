<?php
/* 
* Construir una calculadora, se ha de resolver con un script, en la primera ejecución se ha de mostrar el formulario únicamente
* y, en las posteriores, el resultado y el formulario con los valores guardados. 
* Al pulsar uno de los cuatro botones se mostrará la operación solicitada de los valores introducidos en las cajas de texto.
*/
echo <<< _END
    <form action ="calculadora.php" method="post">
    <label>A:</label> <input type = "number" name='A'></input>
    <label>B:</label> <input type = "number" name='B'></input>
    <input type ="submit" value="Suma"/>
    <input type ="submit" value="Resta"/>
    <input type ="submit" value="Mult"/>
    <input type ="submit" value="Divi"/>
    </form>
_END
?>