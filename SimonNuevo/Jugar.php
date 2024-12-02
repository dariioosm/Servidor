<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        svg {
            margin: 10px;
        }
    </style>
</head>
<body>
    <h4>simon</h4>
    <h6>pulsa todos los botones en orden</h6>
    <?php
        session_start();
        
        function pintar_circulos($colors) {
            for ($i = 0; $i < 4; $i++) {
                echo '<svg width="100" height="100">';
                echo '<circle id="circle' . ($i + 1) . '" cx="50" cy="50" r="40" fill="' . $colors[$i] . '"></circle>';
                echo '</svg>';
            }
        }

        // Inicialización de variables de sesión
        if (!isset($_SESSION['contador'])) {
            $_SESSION['contador'] = 0;
            $_SESSION['colors'] = ['black', 'black', 'black', 'black'];
            $_SESSION['combinacion_correcta'] = ['randomcolor', 'randomcolor2', 'randomcolor3', 'randomcolor4']; // Asegúrate de que los colores coincidan
        } else {
            // Verifica si se ha enviado un color
            if (isset($_POST['color'])) {
                $_SESSION['colors'][$_SESSION['contador']] = $_POST['color']; // Almacena el color presionado
                $_SESSION['contador']++;
            }
        }

        // Pintar círculos y verificar combinación
        if ($_SESSION['contador'] < 4) {
            pintar_circulos($_SESSION['colors']);
        } else {
            pintar_circulos($_SESSION['colors']);
            // Compara los colores seleccionados con la combinación correcta
            if ($_SESSION['colors'] === $_SESSION['combinacion_correcta']) {
                header("Location: Acierto.php");
                exit(); // Asegúrate de salir después de la redirección
            } else {
                header("Location: Fallo.php");
                exit(); // Asegúrate de salir después de la redirección
            }
        }
    ?>  
    <form method='post'>
        <button type='submit' name='color' value='red'>Rojo</button>
        <button type='submit' name='color' value='green'>Verde</button>
        <button type='submit' name='color' value='yellow'>Amarillo</button>
        <button type='submit' name='color' value='blue'>Azul</button>
    </form>  
</body>
</html>