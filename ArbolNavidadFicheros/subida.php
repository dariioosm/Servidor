<?php 
$directory="uploads/";
$target_file=$directory.basename($_FILES["archivoSubir"]["name"]);
$tipoArchivo=pathinfo($target_file,PATHINFO_EXTENSION);

//TODO comprobar si es real o no el archivo subido
$comprueba = getimagesize($_FILES["archivoSubir"]["mime"]);
if($comprueba!== false){
    echo "El fichero es una imagen".$comprueba["mime"];
}else{
    echo "El fichero seleccionado no es una imagen";
}
//TODO comprobar si existe el fichero
if(file_exists($target_file)){
    echo "El fichero existe";
}
//TODO comprobar tipo de archivo
if($tipoArchivo !="jpg" && $tipoArchivo !="png" && $tipoArchivo !="jpeg" && $tipoArchivo !="gif"){
    echo "solo se puede subir archivos de imagen";
}

?>