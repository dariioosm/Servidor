<h1>Dime tu edad:</h1>
<?php 
echo <<< _END
<form action="consulta.php" method="post">
    <input type="radio">Menos de 14 años</input>
    <input type="radio">Entre 15 y 20 años</input>
    <input type="radioDe 21 a 40 años"></input>
    <input type="radio">Entre 41 y 60 años</input>
    <input type="radio">Más de 60 años</input>
</form>
_END
?>