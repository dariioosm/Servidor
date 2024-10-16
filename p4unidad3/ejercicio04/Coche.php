<?php 
class Coche extends Cuatro_ruedas{
    public $numero_cadenas_nieve;


    //TODO  getter y setter de las cadenas

    public function setCadenas($numero_cadenas_nieve){
        $this->numero_cadenas_nieve;
    }
    public function getCadenas(){
        return $this->numero_cadenas_nieve;
    }


    //TODO aplicar los metodos para añadir y quitar cadenas

    public function annadir_cadenas_nieve($num){
        $this -> numero_cadenas_nieve = $this -> numero_cadenas_nieve +$num;
        return 'El numero de cadenas que tiene el coche es: '.$this -> numero_cadenas_nieve;

    }

    public function quitar_cadenas_nieve($num){
        $this -> numero_cadenas_nieve = $this -> numero_cadenas_nieve -$num;
        return 'El numero de cadenas que tiene el coche es: '.$this -> numero_cadenas_nieve;
    }

    public function __toString()
    {
        return 'El color del coche es '.parent::$color.'<br> El nuevo peso del coche es '.parent::$peso;
    }

}


?>