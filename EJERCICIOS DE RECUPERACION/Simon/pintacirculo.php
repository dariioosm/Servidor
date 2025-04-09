<?php

function rellenaCirculo($colores){
    foreach($colores as $color){
echo'<svg width="100" height="100">';
echo'<circle cx="50" cy="50" r="40" fill="'.$color.'"></circle>';
echo'</svg>';
}
}

?>