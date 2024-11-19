<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $fondo=$_POST['color'];
    setcookie('color',$fondo,time()+18000000000);
    $color=$fondo;
}else if(!isset($_COOKIE['color'])){
    $color='white'; 
}else{
    $color=$_COOKIE['color'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($color);?>">
<form action="" method="post">
    <label for="">
        <input type="radio" name="color" value="red" <?php echo ($color=='red')?'checked':'';?>>Rojo</input>
    </label>
    <br>
    <label for="">
        <input type="radio" name="color" value="green" <?php echo ($color=='green')?'checked':'';?>>Verde</input>
    </label>
    <br>
    <label for="">
        <input type="radio" name="color" value="blue" <?php echo ($color=='blue')?'checked':'';?>>Azul</input>
    </label>
    <br>
    <button type="submit">Guardar</button>
</form>
</body>
</html>