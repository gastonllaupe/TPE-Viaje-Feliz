<?php
include 'Pasajero.php';
class PasajeroVIP extends Pasajero{
    private $numViajeF;
    private $millas;

    public function __construct($nom,$ape,$doc,$tel,$numA,$numT,$NViaje,$milla){
        parent::__construct($nom,$ape,$doc,$tel,$numA,$numT);
        $this->numViajeF = $NViaje;
        $this->millas = $milla;
    }

    public function getNumeroViaje(){
        return $this->numViajeF;
    }

    public function getMillas(){
        return $this->millas;
    }

    public function setNumeroViaje($nuevo){
        $this->numViajeF = $nuevo;
    }

    public function setMillas($nuevo){
        $this->millas = $nuevo;
    }

    public function darPorcentajeIncremento(){
        if ($this->getMillas()>300){
            $porcentaje = 30;
        }else{
            $porcentaje = 35;
        }
        return $porcentaje;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "Numero de viajero frecuente: " . $this->getNumeroViaje() . "\n";
        $cadena .= "Cantidad de millas: " . $this->getMillas() . "\n";
        return $cadena;
    }
}