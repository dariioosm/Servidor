<form action="#"  method="post">
<label>Introduce un mes en formato numerico</label> <input type="number" name="mes"/>
<label>Introduce un año (AAAA)</label><input type="number" name="anno"/>
<input type="submit" value="enviar"/>

</form>
<?php 
if(isset($_POST['mes'])&&isset($_POST['anno'])){
    
$mes = date('m');
$anno= date('Y');
    function dibujaCalendario(){
        echo "<table><tr><th>$mes</th> <th>$anno</th> <tr></tr></table>";
    }
}

?>