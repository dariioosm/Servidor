<?php 
/*
TODO apartado a)
*Declara un array de enteros de nombre $coches e introduce en él 8 elementos
*cuyos valores sean 32, 11, 45, 22, 78, -3, 9, 66, 5. A continuación muestra por
*pantalla el elemento con localizador 5. Deberás obtener por pantalla que se visualiza -3
*/




/*
TODO apartado b)
*Declara un array de numéricos decimales tipo double de nombre $importe e
*introduce en él cuatro elementos que sean 32.583, 11.239, 45.781, 22.237. A
*continuación muestra por pantalla el elemento con localizador 1 y el 3.
*/
$importe = array(32.583, 11.239, 45.781, 22.237);
echo "apartado b) <br> <br>";
echo $importe["0"];
echo "<br>";
echo $importe["2"];
echo "<br> <br>";
/*
TODO apartado c)
*Declara un array de booleanos de nombre $confirmado e introduce en él seis
*elementos que sean true, true, false, true, false, false. A continuación muestra por
*pantalla el elemento con localizador cero. Deberás obtener por pantalla que se muestra “true”
*/
$boleanos= array(true, true, false, true, false, false);
echo "apartado c) <br> <br>";
echo $boleanos["0"]."<br> <br>";

/*
TODO apartado d)
*Declara un array de strings de nombre $jugador e introduce en él 5 elementos
*que sean "Crovic", "Antic", "Malic", "Zulic" y "Rostrich". A continuación usando el
*operador de concatenación haz que se muestre la frase: <<La alineación del
*equipo está compuesta por Crovic, Antic, Malic, Zulic y Rostrich.>>
*/
echo "apartado d) <br><br>";
$jugador=array("Crovic","Antic","Malic","Zulic","Rostrich");
echo "La alineación del equipo está compuesta por: ";
for ($i=0; $i<=count($jugador)-1;$i++){
    echo $jugador[$i].", ";
    if($i==4){
        echo " y, ".$jugador[$i].".";
    }
}
?>