<?php 
echo "<form action='#' method = 'post'>
    <label>Numero de elementos: </label>
    <input type = 'number' name= 'valor' required/>
    <input type = 'submit' value = 'aceptar'>
</form>";

if(isset($_POST['valor'])){
    //TODO comprobar que tenga valores el array y coger el numero introducido para hacer el bucle con los sumandos pertinentes
    echo "<form action='#' method = 'post'>";
    for($i=1;$i<= $_POST['valor'];$i++){
        echo $i."<input type='number' name='$i' required> <br>";
    }
    echo '<input type="submit" value="enviar">';
    echo '</form>';
    if(isset($_POST['0'])){
        $suma=0;
    foreach($_POST as $indice => $valor){
        $suma+=$valor;
    }
    echo 'EL numero de indices del array es: '.count($_POST).'<br>';
    echo 'La suma de los sumandos es: '.$suma;
    }
    
}


?>
