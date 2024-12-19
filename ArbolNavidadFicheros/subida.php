<?php 
$directory="uploads/";
$target_file=$directory.basename($_FILES["archivoSubir"]["name"]);
$tipoArchivo=pathinfo($target_file,PATHINFO_EXTENSION);
$subidaOk=1;
//TODO comprobar tipo de archivo
if($tipoArchivo !="jpg" && $tipoArchivo !="png" && $tipoArchivo !="jpeg" && $tipoArchivo !="gif" && $tipoArchivo !="jfif"){
    echo "solo se puede subir archivos de imagen";
    $subidaOk=0;
}
//TODO comprobar si hay un error en la subida de archivo
if($_FILES["archivoSubir"]["error"]!=0){
    echo "Error al subir el archivo: ". $_FILES["archivoSubir"]["error"];
    $subidaOk=0;
}


//TODO comprobar si es real o no el archivo subido
$comprueba = getimagesize($_FILES["archivoSubir"]["tmp_name"]);
if($comprueba!== false){
    echo "El fichero es una imagen".$comprueba["mime"];
    $subidaOk=1;
}else{
    echo "El fichero seleccionado no es una imagen";
    $subidaOk=0;
}
//TODO mover el archivo al destino si las comprobaciones ✔
if($subidaOk==1){
    if(move_uploaded_file($_FILES["archivoSubir"]["tmp_name"],$target_file)){
        echo "<table>";
        //TODO recorrer los 4 niveles del arbol
        for($i=0;$i<4;$i++){
            echo "<tr>;";
                //TODO moverme por los tr y poner los td con la imagen guardada en uploads
                for($j=0;$j<4;$j++){
                    echo"<td>";
                    echo "<img src='".$target_file. "'>";
                    echo"</td>";
                }
            echo"</tr>";
        }
        echo "</table>";
    }
}
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
            <td colspan="1"><img src="uploads/" alt=""></td>
        </tr>
        <tr>
            <td colspan="2"><img src="uploads/" alt=""></td>
        </tr>
        <tr>
            <td colspan="3"><img src="uploads/" alt=""></td>
        </tr>
        <tr>
            <td colspan="4"><img src="uploads/" alt=""></td>
        </tr>
    </table>
</body>
</html>