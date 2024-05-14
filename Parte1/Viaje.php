<?php

class Viaje{
    private $codigoViaje;
    private $destino;
    private $pasajerosMax;
    private $pasajeros = [];

    public function __construct($codViaje,$destin,$pasajeMax,$pasaje){
        $this->codigoViaje = $codViaje;
        $this->destino = $destin;
        $this->pasajerosMax = $pasajeMax;
        $this->pasajeros = $pasaje;
    }

    public function getCodigo (){
        return $this->codigoViaje;
    }

    public function getDestino (){
        return $this->destino;
    }

    public function getPasajeMax (){
        return $this->pasajerosMax;
    }

    public function getPasajeros (){
        return $this->pasajeros;
    }

    public function setCodigo ($nuevo){
        $this->codigoViaje = $nuevo;
    }

    public function setDestino ($nuevo){
        $this->destino = $nuevo;
    }

    public function setPasajeMax ($nuevo){
        $this->pasajerosMax = $nuevo;  
    }

    public function setPasajerosNombre ($indice,$nuevo){
        $pasajero=$this->pasajeros[$indice];
        $pasajero->setNombre($nuevo);
    }

    public function setPasajerosApellido ($indice,$nuevo){
        $pasajero=$this->pasajeros[$indice];
        $pasajero->setApellido($nuevo);
    }

    public function setPasajerosDoc ($indice,$nuevo){
        $pasajero=$this->pasajeros[$indice];
        $pasajero->setNumeroDoc($nuevo);
    }

    public function datosPasajeros (){
        $arreglo = $this->getPasajeros();
        $texto = "";
        for($i=0; $i < count($arreglo); $i++){
            $numero = $i + 1;
            $texto .=  "Pasajero Numero " . $numero . ": \n" . $arreglo[$i] . "\n";
        }
        return $texto;
    }

    public function __toString(){
        $cadena ="Codigo: " . $this->getCodigo() . "\n";
        $cadena .= "Destino: " . $this->getDestino() . "\n";
        $cadena .= "Maximo de pasajeros: " . $this->getPasajeMax() . "\n";
        $cadena .= "Datos del responsable: \n__________________________________________ \n" . $this->getResponsable() . "\n";
        $cadena .= "Datos de los pasajeros: \n__________________________________________ \n" . $this->datosPasajeros() . "\n";
        return $cadena;
    }
}