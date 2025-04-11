<?php
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $listaMotos;
    private $precioFinal;

    /**
     * crea el objeto
     * @param int $num
     * @param string $fec
     * @param object $clie
     * @param array $motos
     * @param float $pFin
     */
    public function __construct($num, $fec, $clie , $motos, $pFin){
        $this->numero=$num;
        $this->fecha=$fec;
        $this->objCliente=$clie;
        $this->listaMotos=$motos;
        $this->precioFinal=$pFin;
    }

    /**
     * devuelve el valor
     * @return int
     */
    public function getNumero(){
        return $this->numero;
    }

    /**
     * cambia el valor
     * @param int $nuevo
     * @return void
     */
    public function setNumero($nuevo){
        $this->numero=$nuevo;
    }

    /**
     * devuelve el valor
     * @return string
     */
    public function getFecha(){
        return $this->fecha;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setFecha($nuevo){
        $this->fecha=$nuevo;
    }

    /**
     * devuelve el valor
     * @return object
     */
    public function getCliente(){
        return $this->objCliente;
    }

    /**
     * cambia el valor
     * @param object $nuevo
     * @return void
     */
    public function setCliente($nuevo){
        $this->objCliente=$nuevo;
    }

    /**
     * devuelve el valor
     * @return array
     */
    public function getMotos(){
        return $this->listaMotos;
    }

    /**
     * cambia el valor
     * @param array $nuevo
     * @return void
     */
    public function setMotos($nuevo){
        $this->listaMotos=$nuevo;
    }

    /**
     * devuelve el valor
     * @return float
     */
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    /**
     * cambia el valor
     * @param float $nuevo
     * @return void
     */
    public function setPrecioFinal($nuevo){
        $this->precioFinal=$nuevo;
    }

    /**
     * devuelve los datos en una cadena de texto
     * @return string
     */
    public function __tostring(){
        $mensaje= "La venta " . $this->getNumero() . ", del dia " . $this->getFecha() . ".\n Realizada por el cliente " . $this->getCliente()->__tostring() . ".\nLLeva las motos \n"; 
        foreach($this->getMotos() as $moto){
            $mensaje= $mensaje . "- ". $moto->__tostring() . "\n";
        }
        $mensaje= $mensaje . "En un total de $" . $this->getPrecioFinal();
        return $mensaje;
    }

    /**
     * incorpora una moto a la lista de motos si esta disponible
     * @param object $objMoto
     * @return bool
     */
    public function incorporarMoto($objMoto){
        $mensaje=false;
        if( $objMoto->getDisponibilidad()){
            $cantMotos= count($this->getMotos());
            $motos[]= $this->getMotos();
            $motos[$cantMotos]=$objMoto;
            $this->setMotos($motos);
            $this->setPrecioFinal($this->getPrecioFinal()+ $objMoto->darPrecioVenta());
            $mensaje= true;
        }
        return $mensaje;
    }
}
?>
