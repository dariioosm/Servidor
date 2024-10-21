<?php 
/* 
* Construir una calculadora, se ha de resolver con dos script, el primero muestra elformulario y el segundo el resultado. 
* Al pulsar el botón ENVIAR se mostrará la suma de los valores introducidos en las cajas de texto
*/
echo <<< _END
    <form action = "suma01.php" method="post" >
        <label> A: </label>
        <input type="number"name="numero1"> </input>
        <label> B: </label>
        <input type="number" name="numero2"> </input>
        <input type="submit" value="Enviar"> </input>
    </form>
_END;

?>