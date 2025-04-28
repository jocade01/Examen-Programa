<?php
//ejercicio 3
//Hacemos que la clase Lightning herede de la clase Connection y Lamp
require_once 'Connection.php';
require_once 'Lamp.php';
//Creamos la clase Lightning que es hija de Connection
class Lightning extends Connection {
//Creamos la funcion getAllLamps que nos devuelve todos los datos de la tabla lamps de la base de datos
    public function getAllLamps() {
        //Hacemos que $sql tenga todos los datos que le hemos pedido anteriormente de la tabla Lamps
        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamp_on,
        lamp_models.model_part_number,lamp_models.model_wattage,
        zones.zone_name FROM lamps INNER JOIN lamp_models ON
        lamps.lamp_model=lamp_models.model_id INNER JOIN zones ON
        lamps.lamp_zone = zones.zone_id ORDER BY lamps.lamp_id;";

        //Esto es una consulta a la base de datos que nos devuelve todos los datos de la tabla lamps
        $stmt = $this->getConn()->query($sql);
        //Creamos un array vacio para guardar los datos que nos devuelve la consulta
        $lamps = [];
        //Aqui hacemos un bucle para recorrer las filas dentro y asi obtener su valor
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lamp = new Lamp (
                $row['lamp_id'],
                        $row['lamp_name'],
                        $row['lamp_on'],
                        $row['model_part_number'],
                        $row['model_wattage'],
                        $row['zone_name']
            );
        
            
            $lamps[] = $lamp;
        }
        return $lamps;
        }
// /Creamos la funcion drawLampsList que nos dibuja la lista de las lamparas
        public function drawLampsList() {
            $lamps = $this->getAllLamps();
// Aqui ponemosla base que hemos cogido del html para mostrarla por pantalla
            echo '<div class="center">
            <h1>BIG STADIUM - LIGHTING CONTROL PANEL</h1>
            <form action="" method="post">
                <select name="filter">
                    <option value="all">All</option>
                    <option value="1">Fondo Norte</option>
                    <option value="2">Fondo Sur</option>
                    <option value="3">Grada Este</option>
                    <option value="4">Grada Oeste</option>
                </select>
                <input type="submit" value="Filter by zone">
            </form>';
//Aqui recorremos las filas con un foreach para mostrar la informacion
            foreach ($lamps as $row) {
                $name = $row->getLampName();
                $on = $row->getLampOn();
                $wattage = $row->getLampWattage();
                $zone = $row->getLampZone();
//Aqui hacemos que si la variable de $on esta encendida, es decir es igual a 1, entonces mostrara la informacion junto con la imagen de la bombilla encendida y biceversa si no es 1
                if ($on == 1) {
                     echo "<div class='element on'><h4><img src='img/bulb-icon-on.png'>". $name ."</h4><h1>". $wattage ."W.</h1><h4>". $zone ."</h4></div>"; } 
                else { 
                    echo "<div class='element off'><h4><img src='img/bulb-icon-off.png'>". $name ."</h4><h1>". $wattage ."W.</h1><h4>". $zone ."</h4></div>"; }
            }
        }
//Crearemos la funcion getPotenciaZona para obtener los datos que queremos que salgan
        public function getPotenciaZona() {
//Aqui meteremos los datos de la consulta en $sql y aparte nos aseguramos de que coja las lamparas encendidas y las distribuya por zonas
            $sql = "SELECT SUM(lamp_models.model_wattage) as power, zone_name FROM
            `lamps` INNER JOIN lamp_models on
            lamp_model=lamp_models.model_id inner join zones on lamps.lamp_zone = zones.zone_id
            WHERE lamps.lamp_on = 1
            group by zone_id, zone_name;";
            $stmt = $this->getConn()->query($sql);
            $potencias = [];
            while ($row = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
//Aqui introducimos al array $potencias una clave que sera el nombre de la zona con zone_name y un valor que es el power
                $potencias[$row['zone_name']] = $row['power'];
                
            }
            return $potencias;
        }
//Creamos drawPotenciaZona para sacar por pantalla los datos que hemos sacado en getPotenciaZona
            public function drawPotenciaZona(){
                $potencia = $this->getPotenciaZona();
//Aqui recorremos $potencia y sacamos las variables de $zona y $potencias
                foreach ($potencia as $zona => $potencias){
                echo "<div class='center'><h2>Potencia por: $zona  </h2>";
                    echo "<br>" . $zona . ": " . $potencias . "W </br> "; 
                    echo "</div>";
                }
            }
            }
        

?>
