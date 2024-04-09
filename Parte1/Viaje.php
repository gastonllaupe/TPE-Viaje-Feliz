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
            $texto .= $arreglo[$i]->getNombre() . " " . $arreglo[$i]->getApellido() . " " . $arreglo[$i]->getNumeroDoc() . "\n";
        }
        return $texto;
    }

    public function __toString(){
        return $this->getCodigo() . " " . $this->getDestino() . " " . $this->getPasajeMax() . "\n" . $this->datosPasajeros() . "\n";
    }
}