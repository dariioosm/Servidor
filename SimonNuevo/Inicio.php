<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon jiji</title>
</head>
<body>
    <h5>Juego de simon</h5>
    <h6>Hola, memoriza la combinacion</h6>
    <?php
    session_start();
    $paleta_colores=["red","green","blue","yellow"];
    $_SESSION['randomcolor']=rand(0,3);
    $_SESSION['randomcolor2']=rand(0,3);
    $_SESSION['randomcolor3']=rand(0,3);
    $_SESSION['randomcolor4']=rand(0,3);
    
    //? mete el color generado en el circulo
    $randomcolor=$_SESSION['randomcolor'];
    $randomcolor2=$_SESSION['randomcolor2'];
    $randomcolor3=$_SESSION['randomcolor3'];
    $randomcolor4=$_SESSION['randomcolor4'];
    

    //? guarda el color de cada circulo en su respectiva posicion
    $color1=$paleta_colores[$randomcolor];
    $color2=$paleta_colores[$randomcolor2];
    $color3=$paleta_colores[$randomcolor3];
    $color4=$paleta_colores[$randomcolor4];

    
    //! esto es lo que realmente coge el comparador ejn jugar.php
    $_SESSION['color1']=$color1;
    $_SESSION['color2']=$color2;
    $_SESSION['color3']=$color3;
    $_SESSION['color4']=$color4;
    
    function color($color1,$color2,$color3,$color4){
        $colores=[$color1,$color2,$color3,$color4]; //? combinacion para jugar
        for($i=0;$i<4;$i++){
            echo'<svg width="100" height="100">';
            echo '<circle cx="50" cy="50" r="40" fill="'.$colores[$i].'"></circle>';
            echo '</svg>';
        }
    }
    color($color1,$color2,$color3,$color4);
    ?>
    <form action ="Jugar.php" method='post'>
    <input type='submit' value='jugar'></input>
    </form>
</body>
</html>