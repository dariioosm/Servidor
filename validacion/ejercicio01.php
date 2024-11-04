<?php 

//TODO Ejercicio 01
$valor = " Es tu nombre O\'reilly? ";
$resultado = trim($valor);
echo $valor.'<br>';
echo $resultado;

/*
?La funcion trim elimina los espacios en blanco
*/
$resultado = stripslashes($valor);
echo $resultado;
/*
?La funcion striplashes convierte las doble barras en simples y cambia las barras simples por comilla simple (')
*/

//TODO Ejercicio 02

function test_entrada($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    return $valor;
   }
/* 
? La funcion test_entrada recibe la variable $valor y en primer lugar los espacios en blanco. 
?Y, posteriormente, el striplashes convierte la barra simple en el mensaje por una comilla simple (').
 */   

?>

//TODO Ejercicio 03

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
/*
? En estea linea de codigo, se crea un formulario con el metodo post.
? Llama a una accion en la que indica la direccion relativa del archivo que se encuentra alojado en servidor
 */

 //TODO Ejercicio 04

 Sexo:
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
value="mujer"> Mujer
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
value="hombre"> Hombre
<span class="error">* <?php echo $sexoErr;?></span><br><br>
/*
? En este bloque de codigo html se puede observar dos botones de tipo radio en los que primeramente se comprueba si se ha enviado el formulario.
? Posteriormente, si se ha clicado en cualquiera de los botones, se indica que es Hombre o Mujer si se ha cliqueado en cualquiera de los botones respectivamente.
? Tambien, se lanza un mensaje de que se ha pulsado el boton. Si no se ha utilizado ninguno de los dos botonoes, Se manda un mensaje de error por no haber accionado ninguna de las opciones
*/

<?php

//TODO Ejercicio 05
$email="abc@abc.com";
$emailErr="Email correcto";
if (empty($email)) {
 $emailErr = "Se requiere Email";
 } else {
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Fomato de Email invalido";
 }
 }
echo $email;
echo "<br>";
echo $emailErr;


?>

//TODO Ejercicio 06
mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
/*
?Este bloque de codigo tiene un input de texto de tipo email (correo electronico) en el que si el texto introducido tiene el formato de correo correcto, se saca por pantalla la direccion escrita.
? En caso de que no sea correcto el correo, sale un span en el que se indica un mensaje indicando que es un formato incorrecto 
 */

 //TODO Ejercicio 07
 /*
 ? Las expresiones regulares 
  */