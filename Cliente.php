<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $nroDoc;
    private $deBaja;

    /**
     * crea el objeto
     * @param string $nom   nombre
     * @param string $ap    apellido
     * @param string $tDoc   tipo documento
     * @param int $nDoc   nro documento
     * @param bool $dBaj   si esta dado de baja o no
     */
    public function __construct($nom,$ap,$tDoc,$nDoc,$dBaj){
        $this->nombre=$nom;
        $this->apellido=$ap;
        $this->tipoDoc=$tDoc;
        $this->nroDoc=$nDoc;
        $this->deBaja=$dBaj;
    }

    /**
     * devuelve el valor
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setNombre($nuevo){
        $this->nombre=$nuevo;
    }
    
    /**
     * devuelve el valor
     * @return string
     */
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setApellido($nuevo){
        $this->apellido=$nuevo;
    }
    
    /**
     * devuelve el valor
     * @return string
     */
    public function getTipoDoc(){
        return $this->tipoDoc;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setTipoDoc($nuevo){
        $this->tipoDoc=$nuevo;
    }
    
    /**
     * devuelve el valor
     * @return int
     */
    public function getNroDoc(){
        return $this->nroDoc;
    }

    /**
     * cambia el valor
     * @param int $nuevo 
     * @return void
     */
    public function setNroDoc($nuevo){
        $this->nroDoc=$nuevo;
    }

    
    /**
     * devuelve el valor
     * @return bool
     */
    public function getDadoDBaja(){
        return $this->deBaja;
    }

    /**
     * cambia el valor
     * @param bool $nuevo
     * @return void
     */
    public function setDadoDBaja($nuevo){
        $this->deBaja=$nuevo;
    }

    public function __tostring(){
        $mensaje="El cliente\nNombre: ". $this->getNombre(). " Apellido: ". $this->getApellido(). ". Tipo y numero de documento: ". $this->getTipoDoc() ." ". $this->getNroDoc();
        if($this->getDadoDBaja()){
            $mensaje= $mensaje . "\n Está dado de baja.";
        }else{
            $mensaje= $mensaje . "\nNo está dado de baja.";
        }
        return $mensaje;
    }
}
?>