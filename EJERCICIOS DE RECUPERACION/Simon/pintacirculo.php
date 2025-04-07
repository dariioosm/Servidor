<?php

function rellenaCirculo($colores){
    for($i=0;$i<count($colores);$i++){
echo'<svg width="100" height="100">';
echo'<circle cx="50" cy="50" r="40" fill="'.$colores[$i].'"></circle>';
echo'</svg>';
}
}

?>