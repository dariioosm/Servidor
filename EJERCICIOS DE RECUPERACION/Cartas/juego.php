<?php 

/*
?Si no se ha pulsado ningun boton de levantar carta, el valor guardado en sesion es cero y, es nulo el contenido de la carta levantada
?Cuando se carga el formulario al dar un botón, la variable cartalevantada tiene el valor del submit
?Se pasa al condicional para verificar si el valor del boton es distinto de null y se incrementa en 1 el numero del contador
*/
session_start();
$respuesta=$_SESSION['solucion'];
if(!isset($_POST['levanta'])){
    $_SESSION['levantadas']=0;
}elseif(isset($_POST['levanta'])){
   // $cartalevantada=intval($_POST['levanta']);
}

$cartalevantada = isset($_POST['levanta']) ? intval($_POST['levanta']) : null;
var_dump($cartalevantada);
if($cartalevantada!==null){
    $_SESSION['levantadas']++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo '<h1> Bienvenido '. $_SESSION['usuario'].'</h1> '; ?>
    <h2>Cartas levantadas: <?php echo $_SESSION['levantadas'];?></h2>
        <form action="#" method="post">
          
            <button type="submit" value="0" name="levanta">Levanta la carta 1</button>
            <button type="submit" value="1" name="levanta">Levanta la carta 2</button>
            <button type="submit" value="2" name="levanta">Levanta la carta 3</button>
            <button type="submit" value="3" name="levanta">Levanta la carta 4</button>
            <button type="submit" value="4" name="levanta">Levanta la carta 5</button>
            <button type="submit" value="5" name="levanta">Levanta la carta 6</button> -->

           <!--
            <button type="submit" value="1" name="levanta">Levanta la carta 1</button>
            <button type="submit" value="2" name="levanta">Levanta la carta 2</button>
            <button type="submit" value="3" name="levanta">Levanta la carta 3</button>
            <button type="submit" value="4" name="levanta">Levanta la carta 4</button>
            <button type="submit" value="5" name="levanta">Levanta la carta 5</button>
            <button type="submit" value="6" name="levanta">Levanta la carta 6</button> -->
        </form>
        <form action="comprueba.php" method="post">
            <h1>Pareja</h1>
            <input type="number" name="x" id="x">
            <input type="number" name="y" id="y">
            <button type="submit" name="comprueba">Comprueba</button>
        </form>

        <div class="">
            <?php
            var_dump($_POST['levanta']);
                for($i=1;$i<6;$i++){
                    if($cartalevantada==($i)){
                        switch($respuesta[$i]){
                            case 2:
                                echo'<img src="2.jpg" width="150px" height="200px">';
                                break;
                            case 3:
                                echo'<img src="3.jpg" width="150px" height="200px">';
                                break;
                            case 5:
                                echo'<img src="5.jpg" width="150px" height="200px">';
                                break;
                        }
                    }else{
                        echo'<img src="boca_abajo.jpg" width="150px" height="200px">';
                    }
                }
            ?>

        </div>
</body>
</html>