<?php 
/*
Crea un array multidimensional para poder guardar los componentes de dos
familias: “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el
padre, la madres y los hijos, donde padre, madre e hijos serán los índices y los
índices y los nombres serán los valores. Esta estructura se ha de crear en un solo
array asociativo de tres dimensiones.

Familia "Los Simpson": padre Homer, madre Marge, hijos Bart, Lisa y Maggie. 
Familia "Los Griffin": padre Peter, madre Lois, hijos Chris, Meg y Stewie

*/

$familia=array(
        "Los Simpson"=> array("padre"=>"Homer",
                              "madre"=>"Marge",
                              "hijos"=>array("Bart","Lisa","Maggie")),
        "Los Griffin"=>array("padre"=>"Peter",
                              "madre"=>"Lois",
                              "hijos"=>array("Chris","Meg","Stewie"))
);

foreach($familia as $apellido => $content){
    echo $apellido." ";
    foreach($content as $parentesco => $nombre){
        if($parentesco =='hijos'){
            echo $parentesco." ";
            foreach($nombre as $hijo){
                echo " ".$hijo." ";
            }
            echo "<br>";
        }
        else{
           echo " ".$parentesco." ".$nombre;
        }
    }
}
?>