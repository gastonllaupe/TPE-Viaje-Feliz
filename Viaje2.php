<?php

class Viaje{
    private $codigoViaje;
    private $destino;
    private $pasajerosMax;
    private $pasajeros = [];
    private $responsableV;

    public function __construct($codViaje,$destin,$pasajeMax,$pasaje,$responsable){
        $this->codigoViaje = $codViaje;
        $this->destino = $destin;
        $this->pasajerosMax = $pasajeMax;
        $this->pasajeros = $pasaje;
        $this->responsableV = $responsable;
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

    public function getResponsable (){
        return $this->responsableV;
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

    public function setResponsabe ($nuevo){
        $this->responsableV = $nuevo;
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

    public function setPasajeros ($nuevo){
        $this->pasajeros = $nuevo;
    }

    public function datosPasajeros (){
        $arreglo = $this->getPasajeros();
        $texto = "";
        for($i=0; $i < count($arreglo); $i++){
            $texto .= $arreglo[$i]->getNombre() . " " . $arreglo[$i]->getApellido() . " " . $arreglo[$i]->getNumeroDoc() . " " . $arreglo[$i]->getTelefono() . "\n";
        }
        return $texto;
    }

    public function datosResponsable () {
        $objResp = $this->getResponsable();
        $texto = $objResp->getnumero() . " " . $objResp->getLicencia() . " " . $objResp ->getNombre() . " " . $objResp->getApellido() ;
        return $texto;
    }

    public function pasajeroExiste ($dni){
    $m = count($this->getPasajeros());
    $i = 0;
    $existe = false;
    while ($i < $m && !$existe) {
        if ($this->getPasajeros()[$i]->getNumeroDoc() == $dni){
            $existe = true;
        }
        $i += 1;
    }
    return $existe;
    }
    

    public function __toString(){
        return $this->getCodigo() . " " . $this->getDestino() . " " . $this->getPasajeMax() . " " . $this->datosResponsable() . "\n" . $this->datosPasajeros() . "\n";
    }
}