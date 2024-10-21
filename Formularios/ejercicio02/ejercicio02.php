<h1>Dime tu edad:</h1>
<?php 
echo <<< _END
<form action="consulta.php" method="post">
    <input type="radio" name="edad" value="14"> Menos de 14 años <br>
    <input type="radio" name="edad" value="15-20"> Entre 15 y 20 años <br>
    <input type="radio" name="edad" value="21-40"> De 21 a 40 años <br>
    <input type="radio" name="edad" value="41-60"> Entre 41 y 60 años <br>
    <input type="radio" name="edad" value="61+"> Más de 60 años <br><br>
    <input type="submit" value="resultado">
</form>
_END;
?>
