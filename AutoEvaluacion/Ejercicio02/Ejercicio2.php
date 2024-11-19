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

    // Generar el número binario aleatorio
    $num = [];
    for ($i = 0; $i < 4; $i++) { 
        $num[$i] = rand(0, 1);
    }

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

    // Mostrar representación gráfica según los bits
    $imagenes = [
        1 => 'uno.jpg',
        2 => 'dos.jpg',
        4 => 'cuatro.jpg',
        8 => 'ocho.jpg'
    ];

    for ($i = 3; $i >= 0; $i--) {
        if ($num[$i] == 1) {
            $potencia = 2 ** $i;
            echo '<img src="img/' . $imagenes[$potencia] . '">';
        } else {
            echo '<img src="img/blanco.jpg">';
        }
    }

    // Calcular el valor decimal del binario
    $decimal = 0;
    for ($i = 0; $i < 4; $i++) {
        if ($num[$i] == 1) {
            $decimal += $potencias[$i];
        }
    }

    // Guardar el valor decimal en sesión
    $_SESSION['decimalcorrecto'] = $decimal;
    ?>

    <form action="ejercicio21.php" method="post">
        <label for="numdecimal">Número decimal: </label>
        <input type="text" id="numdecimal" name="numdecimal" required>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
