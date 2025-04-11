<?php
class Moto{
    private $precio;
    private $codigo;
    private $anioFabrica;
    private $descripcion;
    private $porcIncrAnual;
    private $disponibilidad;

    /**
     * crea el objeto
     * @param string $cod  codigo
     * @param int $costo    
     * @param int $anio de fabricacion
     * @param string $descr descripcion
     * @param float $porcentaje de incremento anual
     * @param bool $activa   si esta disponible a la venta
     */
    public function __construct($cod,$costo,$anio,$descr,$porcentaje,$activa){
        $this->precio=$costo;
        $this->codigo=$cod;
        $this->anioFabrica=$anio;
        $this->descripcion=$descr;
        $this->porcIncrAnual=$porcentaje;
        $this->disponibilidad=$activa;
    }

    
    /**
     * devuelve el valor
     * @return string
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setCodigo($nuevo){
        $this->codigo=$nuevo;
    }
    
    /**
     * devuelve el valor
     * @return int
     */
    public function getCosto(){
        return $this->precio;
    }

    /**
     * cambia el valor
     * @param int $nuevo
     * @return void
     */
    public function setCosto($nuevo){
        $this->precio=$nuevo;
    }
    
    /**
     * devuelve el valor
     * @return int
     */
    public function getAnioFabrica(){
        return $this->anioFabrica;
    }

    /**
     * cambia el valor
     * @param int $nuevo
     * @return void
     */
    public function setAnioFabrica($nuevo){
        $this->anioFabrica=$nuevo;
    }
    
    /**
     * devuelve el valor
     * @return string
     */
    public function getDescripcion(){
        return $this->descripcion;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setDescripcion($nuevo){
        $this->descripcion=$nuevo;
    }

    /**
     * devuelve el valor
     * @return float
     */
    public function getPorcIncremAnual(){
        return $this->porcIncrAnual;
    }

    /**
     * cambia el valor
     * @param float $nuevo
     * @return void
     */
    public function setPorcIncremAnual($nuevo){
        $this->porcIncrAnual=$nuevo;
    }

    /**
     * devuelve el valor
     * @return bool
     */
    public function getDisponibilidad(){
        return $this->disponibilidad;
    }

    /**
     * cambia el valor
     * @param bool $nuevo
     * @return void
     */
    public function setDisponibilidad($nuevo){
        $this->disponibilidad=$nuevo;
    }

    public function __tostring(){
        $mensaje="La moto " .$this->getCodigo(). "\nCosto.¿: $" ." con un ". $this->getPorcIncremAnual() . "% de incremento anual." .$this->getCosto() . "\nDescripción:\n".  $this->getDescripcion();
        if($this->getDisponibilidad()){
            $mensaje= $mensaje . "\nEstá a la venta.";
        }else{
            $mensaje= $mensaje . "\nNo está a la venta.";
        }
        return $mensaje;
    }

    /**
     * calcula el valor por el cual puede ser vendida una moto
     * @param object $unaMoto
     * @return float
     */
    public function darPrecioVenta($unaMoto){
        if( $unaMoto->getDisponibilidad()){
            $anioActual=2025;
            $antiguedad= $anioActual - $unaMoto->getAnioFabrica;
            $venta=$unaMoto->getCosto() + ($unaMoto->getCosto * $unaMoto->getPorcIncremAnual * $unaMoto->$antiguedad);
            $mensaje= $venta;
        }else{
            $mensaje= -1;
        }
        return $mensaje;
    }
}
?>