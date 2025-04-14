<?php

require_once 'Lighting.php';
class Lamp extends Connection {
    private $lamp;


    public function __construct(){
        $this->lamp;
    }
    public function almacenar($lamp) {
        $atributo = 'SELECT lamp_id, lamp_name, lamp_on, lamp_model, lamp_zone FROM lamps;';
        return $lamp;
    }

    /**
     * Get the value of atributo
     */ 
    public function getLamp()
    {
        return $this->lamp;
    }
}




?>