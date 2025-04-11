<?php
include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";

$objCliente1= new Cliente("Juan" , "Castillo" , "DNI" , 38261539, false);
$objCliente2= new Cliente("Martina" , "Benitez" , "DNI" , 281367442, true);

$objMoto1= new Moto(11,2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$objMoto2= new Moto(12, 584000, 2021, "Zanella Zr 150 Ohe", 0.70, true);
$objMoto3= new Moto(13, 999900, 2023, "Zanella Patagonia Eagle 250", 0.55, false);

$objEmpresa= new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1,$objCliente2], [$objMoto1,$objMoto2,$objMoto3], []);
echo $objEmpresa->registrarVenta([11,12,13],$objCliente2);
echo $objEmpresa->registrarVenta([0],$objCliente2);
echo $objEmpresa->registrarVenta([2], $objCliente2);
echo $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDoc(),$objCliente2->getNroDoc());
echo $objEmpresa;
?>
