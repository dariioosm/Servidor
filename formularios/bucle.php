
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="resultadodinamico.php">
    <?php
    for($i =0; $i<3;$i++){
        echo $i."<label name='$i':> </label> <input type='number' name='$i':></input> <br>";
    }
    ?>
    <input type="submit" name="Enviar"></input>
    </form>    
</body>
</html>




