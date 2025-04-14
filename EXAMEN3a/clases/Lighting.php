<?php
class Lighting extends Connection{
    private $lamps = [];

    public function __construct(){
        $lamp = $this->lamps;
        }
    public function getAllLamps($lamp){
        $lamp = 'SELECT * FROM LAMPS';
        return $this->$lamp;    }

    /**
     * Get the value of lamps
     */ 
    public function getLamps()
    {
        return $this->lamps;
    }

    /**
     * Set the value of lamps
     *
     * @return  self
     */ 
    public function setLamps($lamps)
    {
        $this->lamps = $lamps;

        return $this;
    }
}




?>