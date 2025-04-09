<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>Memoriza la combinacion</h5>
    <?php
    session_start();
    require('pintacirculo.php');
    
    
    $paleta_colores=['red','green','yellow','blue'];


    for($i=0;$i<4;$i++){
        $indice=rand(0,3);
        $relleno=$paleta_colores[$indice];
        $colores[]=$relleno;
    }

/*  variable relleno es la que se utiliza para sacar el color de los circulos */
//! session combinacion no recoge los colores de relleno
//! array respuesta coge todos los valores negros y coge las respuestas del formulario y no las elimina
//! la session con la respuesta correcta no tiene los mismo valores que los que se generan en primer lugar

    //? guardo la combinacion creada en un session
    $_SESSION['combinacion']=$colores;
    
    rellenaCirculo($colores);
    ?>
    <form action ="jugar.php" method='post'>
    <input type='submit' value='jugar'></input>
    </form>
</body>
</html>