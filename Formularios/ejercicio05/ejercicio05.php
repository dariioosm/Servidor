<form action="#" method="post">
<?php
for($i =1; $i<9;$i++){
    echo $i."<label for='$i':> </label> <input type='number' name='$i'></input> <br>";
}
echo  "<input type='submit' name='Enviar'></input>";

?>
</form>
<?php
    if(isset($_POST[$i])){
        $resultado=0;
        for($i =1; $i<9;$i++){
            $resultado+= intval($_POST[$i]);
            echo  $i. '='. $_POST[$i].'<br>';
        }
        echo'El resultado de la suma es: '.$resultado;

       
    }
?>