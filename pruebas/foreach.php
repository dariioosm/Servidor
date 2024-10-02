<?php 
/*
*$mascotas= array('perros'=>"yunito",
*                 'gato'=> "wilson",
*                 'canario'=> "piolin",
*                 'tortuga'=>"mbape"); 
*foreach($mascotas as $animal => $description)
*echo "$animal : $description"."<br>"
*/
$mascotas=array(
    'perros'=> array('mastin'=>'yunito',
                    'salchicha'=>'fuet',
                    'chiguagua'=>'sarnoso'),
    'gatos'=> array('persa'=>'otis',
                    'comun'=>'garfield',
                    'siames'=>'princesa')
);
foreach($mascotas as $animal => $description){
    echo "$animal <br> ********* <br>";
    foreach($description as $tipo => $nombre){
        echo "$tipo:$nombre"."<br>"."<br>";
    }
}

?>