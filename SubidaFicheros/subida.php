<?php
$target_dir = "subidas/";  // Directorio donde se guardarán los archivos subidos
$target_file = $target_dir . uniqid() . "-" . basename($_FILES["archivoSubir"]["name"]);  // Añadimos un prefijo único al nombre del archivo para evitar sobreescribirlo
$subidaOk = 1;  // Variable para controlar si la subida es correcta
$imagenTipoArchivo = pathinfo($target_file, PATHINFO_EXTENSION);  // Obtenemos la extensión del archivo

// Comprobamos si el archivo es un .txt
if ($imagenTipoArchivo !== "txt") {
    echo "Solo se puede subir archivos de tipo .txt";
    $subidaOk = 0;  // Si no es un archivo .txt, no permitimos la subida
}

// Comprobamos si hubo algún error al subir el archivo
if ($_FILES["archivoSubir"]["error"] != 0) {
    echo "Error al subir el archivo: " . $_FILES["archivoSubir"]["error"];
    $subidaOk = 0;  // Si hubo un error, no permitimos la subida
}

// Comprobamos si el archivo ya existe en el servidor
if (file_exists($target_file)) {
    echo "El archivo ya existe.";
    $subidaOk = 0;  // Si el archivo ya existe, no permitimos la subida
}

// Comprobamos el tamaño del archivo (en este caso 300KB)
if ($_FILES["archivoSubir"]["size"] > 300000) {
    echo "El archivo supera el tamaño permitido (300KB)";
    $subidaOk = 0;  // Si el archivo es demasiado grande, no permitimos la subida
}

// Si todas las comprobaciones son correctas, movemos el archivo al directorio de destino
if ($subidaOk == 1) {
    if (move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $target_file)) {
        echo "El archivo " . basename($_FILES["archivoSubir"]["name"]) . " ha sido subido correctamente.";
    } else {
        echo "Hubo un error al mover el archivo al directorio de destino.";
    }
}
?>
