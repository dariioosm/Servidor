<?php 
$target_dir="subidas/";
$target_file=$target_dir.basename($_FILES["archivoSubir"]["name"]);
$subidaOk=1;
$imagenTipoArchivo=pathinfo($target_file,PATHINFO_EXTENSION);

//TODO comprobar si es real o falsa una imagen
    $comprueba=getimagesize($_FILES["archivoSubir"]["tmp_name"]);
    if($comprueba!==false){
        echo "El fichero es una imagen ".$comprueba["mime"].".";
    }else{
        echo "El fichero no es una imagen";
        $subidaOk=0;
    }

//TODO comprobar si existe el fichero
    if(file_exists($target_file)){
        echo "El fichero existe";
        $subidaOk=0;
    }

//TODO comprobar tamaño del archivo
    if($_FILES["archivoSubir"]["size"]>300000){
        echo "El fichero supera las dimensiones";
        $subidaOk=0;
    }
//TODO comprobar el tipo de archivo
    if($imagenTipoArchivo !="txt" ){
        echo"Solo se puede subir archivos txt";
        $subidaOk=0;
    }
?>