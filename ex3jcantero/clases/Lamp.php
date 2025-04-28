<?php
//ejercicio 1
//Creamos la clase Lamp con los atributos necesarios
class Lamp {
    private $lampid;
    private $lampname;
    private $lampon;
    private $lampmodel;
    private $lampwattage;
    private $lampzone;

    //Hacemos el constructor de la clase donde definimos los atributos y les asignamos un valor por defecto
    public function __construct($lamp_id, $lamp_name, $lamp_on, $lamp_model, $potencia, $lamp_zone) {
        $this->lampid = $lamp_id;
        $this->lampname = $lamp_name;
        $this->lampon = $lamp_on;
        $this->lampmodel = $lamp_model;
        $this->lampwattage = $potencia;
        $this->lampzone = $lamp_zone;
    }
//Aqui creamos los getters de los atributos para llamarlos cuando queramos
    public function getLampId() {
        return $this->lampid;
    }

    public function getLampName() {
        return $this->lampname;
    }

    public function getLampOn() {
        return $this->lampon;
    }

    public function getLampModel() {
        return $this->lampmodel;
    }

    public function getLampWattage() {
        return $this->lampwattage;
    }

    public function getLampZone() {
        return $this->lampzone;
    }
}
?>