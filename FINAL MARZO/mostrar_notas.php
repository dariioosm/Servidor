<?php

require 'conexion.php';
$datos = [
    'alumno'=>[],
    'lengua'=>[],
    'matematicas'=>[],
    'sociales'=>[]
];

//TODO consulta para alumnos

$alumnos = $conn ->prepare('SELECT nombre,apellidos from alumnos');
$alumnos->execute();
$result_alumnos = $alumnos->get_result();
while($row = $result_alumnos ->fetch_assoc()){
    $datos['alumno'][]=$row;
}
$alumnos->close();

//TODO consulta para notas de lengua

$lengua = $conn -> prepare('SELECT nota from notas where asignatura LIKE Lengua');
$lengua->execute();
$result_lengua = $lengua->get_result();
while($row = $result_lengua -> fetch_assoc()){
    $datos['lengua'][]= $row;
}
$lengua ->close();


//TODO consulta para notas de matematicas

$matematicas = $conn -> prepare('SELECT nota from notas where asignatura LIKE Matemáticas');
$matematicas ->execute();
$result_matematicas = $matematicas->get_result();
while($row = $result_matematicas ->fetch_assoc()){
    $datos['matematicas'][] = $row;
}   
$matematicas->close();
//TODO consulta para notas de sociales

$sociales = $conn -> prepare('SELECT nota from notas where asignatura LIKE Sociales');
$sociales ->execute();
$result_sociales = $sociales ->get_result();
while($row = $result_sociales ->fetch_assoc()){
    $datos['sociales'][]=$row;
}
$sociales->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Alumno</th>
            <th>Lengua</th>
            <th>Matematicas</th>
            <th>Sociales</th>
        </tr>
    </table>
    <tbody>
        <?php foreach($datos['alumno'] as $row): ?>
            <tr>
                <td> <?= $row['nombre']?>,<?php $row['apellidos']?> </td>
            </tr>
        <?php endforeach;?>
        <?php foreach($datos['lengua'] as $row): ?>
            <tr>
                <td><?= $row['nota']?></td>
            </tr>
        <?php endforeach?>

        <?php foreach($datos['matematicas'] as $row):?>
            <tr>
                <td><?= $row['nota']?></td>
            </tr>
        <?php endforeach?>

        <?php foreach($datos['sociales'] as $row):?>
            <tr>
                <td><?= $row['nota'] ?></td>
            </tr>
        <?php endforeach?>
    </tbody>
</body>
</html>