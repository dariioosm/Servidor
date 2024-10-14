<?php

class Vehiculo{
    
    public $color;
    public $peso;
    public function circula(){
        $is_circula=true;
        echo $is_circula == true ? "Circula":"No circula"; 
    }
    public function annadir_persona($peso_persona){
        
        return  ;
    }

    public function __construct($color, $peso){
        $this -> peso =$peso;
        $this ->color=$color;

    }
    
    public function __toString($peso,$color){
        
     return  "Peso y color: ".$this->peso." ".$this->$color;   
    }
}

?>