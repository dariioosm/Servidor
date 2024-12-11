<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido/a <?php $_SESSION['login']?></h1>
    <form action="" method="post">

    
    </form>
</body>
</html>

<?php
session_start();
if (isset($_SESSION['login'])) {
    echo "<h1>Bienvenido/a " . $_SESSION['login'] . "</h1>";
}
//TODO mostrar las cartas boca abajo


for($i=0;$i<5;$i++){
    echo"<img height=20px src='img/boca_abajo.jpg'/>";
}

//TODO sacar las imagenes de las cartas usando matriz con vectores
$todasCombinaciones=[
    1=>['img/copas_03.jpg','img/copas_02.jpg','img/copas_02.jpg','img/copas_03.jpg','img/copas_05.jpg','img/copas_05.jpg'],
    2=>['img/copas_02.jpg','img/copas_02.jpg','img/copas_05.jpg','img/copas_03.jpg','img/copas_05.jpg','img/copas_03.jpg'],
    3=>['img/copas_02.jpg', 'img/copas_03.jpg','img/copas_05.jpg','img/copas_05.jpg','img/copas_03.jpg','img/copas_02.jpg']
]; 
$aleatorio=rand(1,3);
$_SESSION['correcto']=$todasCombinaciones [$aleatorio];
foreach( $_SESSION['correcto'] as $carta){
        echo"<img src='$carta' height='100px'/>";
    }
?>  