<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $listaClientes;
    private $listaMotos;
    private $listaVentasRealizadas;

    /**
     * crea el objeto
     * @param string $deno
     * @param string $dire
     * @param array $clientes
     * @param array $motos
     * @param array $ventas
     */
    public function __construct($deno, $dire, $clientes, $motos, $ventas){
        $this->denominacion=$deno;
        $this->direccion=$dire;
        $this->listaClientes=$clientes;
        $this->listaMotos=$motos;
        $this->listaVentasRealizadas=$ventas;
    }

    /**
     * devuelve el valor
     * @return string
     */
    public function getDenominacion(){
        return $this->denominacion;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setDenominacion($nuevo){
        $this->denominacion=$nuevo;
    }

    /**
     * devuelve el valor
     * @return string
     */
    public function getDireccion(){
        return $this->direccion;
    }

    /**
     * cambia el valor
     * @param string $nuevo
     * @return void
     */
    public function setDireccion($nuevo){
        $this->direccion=$nuevo;
    }

    /**
     * devuelve el valor
     * @return array
     */
    public function getClientes(){
        return $this->listaClientes;
    }

    /**
     * cambia el valor
     * @param array $nuevo
     * @return void
     */
    public function setClientes($nuevo){
        $this->listaClientes=$nuevo;
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
     * @return array
     */
    public function getVentasRealizadas(){
        return $this->listaVentasRealizadas;
    }

    /**
     * cambia el valor
     * @param array $nuevo
     * @return void
     */
    public function setVentasRealizadas($nuevo){
        $this->listaVentasRealizadas=$nuevo;
    }

    /**
     * devuelve los datos en cadena de texto
     * @return string
     */
    public function __tostring(){
        $mensaje= "La empresa " .$this->getDenominacion() . ", ubicada en " . $this->getDireccion() . ". Tiene los clientes: \n";
        foreach($this->getClientes() as $cliente){
            $mensaje= $mensaje . "- " . $cliente->__tostring() . "\n";
        }
        $mensaje= $mensaje . "Con las motos: \n";
        foreach($this->getMotos() as $moto){
            $mensaje= $mensaje . "- " . $moto->__tostring() . "\n";
        }
        $mensaje= $mensaje . "Realizo las ventas: \n";
        foreach($this->getVentasRealizadas() as $venta){
            $mensaje= $mensaje . "- ". $venta->__tostring() . "\n";
        }
        return $mensaje;
    }

    /**
     * devuelve la moto con el codigo ingresado
     * @param string $codigoMoto
     * @return object
     */
    public function retornarMoto($codigoMoto){
        $motoEncontrada= null;
        $encontrado=false;
        $cantMotos= count($this->getMotos());
        $i=0;

        do{
            if($this->getMotos()[$i]->getCodigo() == $codigoMoto){
                $motoEncontrada= $this->getMotos()[$i];
                $encontrado=true;
            }else{
                $i++;
            }
        }while($i<$cantMotos && !$encontrado);
        return $motoEncontrada;
    }

    /**
     * Summary of registrarVenta
     * @param array $colCodigosMoto
     * @param object $objCliente
     * @return string
     */
    public function registrarVenta($colCodigosMoto, $objCliente){
    $nuevaListaMotos=[];
    $cantCodigos= count($colCodigosMoto);
    $l=0;
    $precioFinalVenta=0;
    $cantVentas= count($this->getVentasRealizadas());
    
    if( ! $objCliente->getDadoDBaja()){
        for($i=0; $i<$cantCodigos; $i++){
            $unaMoto= $this->retornarMoto($colCodigosMoto[$i]);
            if( $unaMoto!=null && $unaMoto->getDisponibilidad() ){
                $nuevaListaMotos[$l]=$unaMoto;
                $precioFinalVenta= $precioFinalVenta + $unaMoto->darPrecioVenta($unaMoto);
                $l++;
            }
        }
        if( count($nuevaListaMotos)> 0){
            $unaVenta= new Venta($cantVentas, date("d,m,y") , $objCliente , $nuevaListaMotos , $precioFinalVenta);
        }
        
    }
    return $precioFinalVenta;
    }

    /**
     * Summary of retornarVentasXCliente
     * @param string $tipo
     * @param int $numDoc
     * @return array
     */
    public function retornarVentasXCliente($tipo,$numDoc){
        $ventas=[];
        foreach($this->getVentasRealizadas() as $venta){
            if($venta->getCliente()->getTipoDoc() == $tipo && $venta->getCliente()->getNroDoc() == $numDoc){
                $ventas[]=$venta;
            }
        }
        return $ventas;
    }
}
?>
