<?php 
$directory="uploads/";
$subidaOk=1;
//TODO comprobar si el formulario se ha enviado
if(isset($_FILES['archivoSubir'])){
    $archivosSubidos=[];
    //TODO hacer un bucle para recorrer las imagenes
    foreach($_FILES['archivoSubir']["name"] as $index=>$contenido){
        $archivoDestino= $directory.basename($_FILES["archivoSubir"]["name"][$contenido]);
        $tipoArchivo=pathinfo($archivoDestino,PATHINFO_EXTENSION);

        //TODO comprobar que las extensiones en el contenido sean formatos de imagen
        //? funcion in_array busca la "aguja en el pajar" => busca los parametros que le he indicado(en este caso formatos de imagen)
        if(!in_array($tipoArchivo,['jpg', 'png', 'jpeg', 'gif', 'jfif'])){
            $subidaOk=0;
            echo"Solo se pueden subir archivos de imagen";
        }
        //TODO comprobar errores en la subida de archivos a servidor
        if($_FILES["archivoSubir"]["error"]!=0){
            echo "Error al subir el archivo: " . $_FILES["archivoSubir"]["error"];
            $subidaOk = 0;
        }
        //TODO mover los archivos a la carpeta uploads
        if($subidaOk==1){
            if(move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $archivoDestino){

            }
        }

    }
}



?>