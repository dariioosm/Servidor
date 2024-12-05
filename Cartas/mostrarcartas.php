<?php 

function sacarCartas(){
    //TODO guardar las combinaciones en un array
    $todasCombinaciones=[
        1=>['img/copas_03.jpg','img/copas_02.jpg','img/copas_02.jpg','img/copas_03.jpg','img/copas_05.jpg','img/copas_05.jpg'],
        2=>[ 'img/copas_02.jpg','img/copas_02.jpg','img/copas_05.jpg','img/copas_03.jpg','img/copas_05.jpg','img/copas_03.jpg'],
        3=>['img/copas_02.jpg','img/copas_03.jpg','img/copas_05.jpg','img/copas_05.jpg','img/copas_03.jpg','img/copas_02.jpg']
    ];
    //TODO hacer un random entre 1 y 3 para que seleccione el patron de cartas que hay que mostrar en pantalla    
    $randomizar= rand(1,3);
    foreach($todasCombinaciones as $combinacion=>$cartas){
        if($combinacion == $randomizar){
            echo $cartas;
        }
    }
}




?>