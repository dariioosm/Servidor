<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Adivina el número decimal</h1>
    <?php 
    session_start();

    // Generar el número binario aleatorio y guardalo en sesion
    $num = [];
    for ($i = 0; $i < 4; $i++) { 
        $num[$i] = rand(0, 1);
    }
    $_SESSION['decimalcorrecto'] = $decimal;

    // Mostrar el número binario
    echo "<h2>El número en binario es: ";
    for ($i = 3; $i >= 0; $i--) {
        echo $num[$i];
    }
    echo "</h2>";

    // Generar potencias de 2
    $potencias = [];
    for ($i = 0; $i < 4; $i++) {
        $potencias[$i] = 2**$i;
    }

    // Mostrar fotos
    $imagenes = [
        1 => '1.jpg',
        2 => '2.jpg',
        4 => '4.jpg',
        8 => '8.jpg'
    ];
    
    for ($i = 3; $i >= 0; $i--) {
        $potencia = 2 ** $i;
    
        if ($num[$i] == 1) {
            echo '<img src="img/' . $imagenes[$potencia] . '" alt="' . $potencia . '">';
        } else {
            echo '<img src="img/blanco.jpg" alt="blanco">';
        }
    }
    

    // Calcular el valor decimal del binario
    $decimal = 0;
    for ($i = 0; $i < 4; $i++) {
        if ($num[$i] == 1) {
            $decimal += $potencias[$i];
        }
    }
    
    ?>

    <form action="ejercicio21.php" method="post">
        <label for="numdecimal">Número decimal: </label>
        <input type="text" id="numdecimal" name="numdecimal" required>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
