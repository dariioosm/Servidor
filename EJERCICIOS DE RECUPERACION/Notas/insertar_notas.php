<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Inserta notas
        <label>ID del alumno<input type="number" name="id" id="id"></label> <br>
        <label for="">Asignatura  <select name="asignatura" id=""> <option value="Lengua">Lengua</option> <option value="Matematicas">Matematicas</option> <option value="Sociales">Sociales</option> </select> </label>
        <label for="">Nota 0-10 <input type="number" name="nota" id="nota" min=0 max =10></label> <br>
        <input type="submit" value="Añadir nota">
    </form><br>
    <a href="director.php">Volver al menu de director</a>
</body>
</html>
<?php 
require 'conexion.php';
session_start();
if(isset($_POST['id'])&&isset($_POST['asignatura'])&& isset($_POST['nota'])){

    $hay_alumno= $conn->prepare('SELECT id FROM alumnos WHERE id= ? ');
    $hay_alumno -> bind_param('i',$_POST['id']);
    $hay_alumno -> execute();

    if($hay_alumno && $hay_alumno->num_rows>0){
        $insert_nota= $conn->prepare ('INSERT  INTO notas  (alumno, asignatura ,nota) VALUES(?,?,?)');
    $insert_nota ->bind_param('isi',$_POST['id'],$_POST['asignatura'],$_POST['nota']);
    $insert_nota->execute();

    }else{
        echo '<br> Alumno no existe en la base de datos';
    }
}
?>