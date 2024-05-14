<?php
include 'Pasajero.php';
class PasajeroCNE extends Pasajero {
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct ($nom,$ape,$doc,$tel,$numA,$numT,$silla,$asis,$comida){
        parent::__construct($nom,$ape,$doc,$tel,$numA,$numT);
        $this->sillaDeRuedas=$silla;
        $this->asistencia=$asis;
        $this->comidaEspecial=$comida;
    }

    public function getSilla(){
        return $this->sillaDeRuedas;
    }

    public function getAsistencia(){
        return $this->asistencia;
    }

    public function getComida(){
        return $this->comidaEspecial;
    }

    public function setSilla($nuevo){
        $this->sillaDeRuedas=$nuevo;
    }

    public function setAsistencia($nuevo){
        $this->asistencia=$nuevo;
    }

    public function setComida($nuevo){
        $this->comidaEspecial=$nuevo;
    }

    public function necesidadesAString(){
        $cadena = "";
        if ($this->getSilla()){
            $cadena = "Necesita silla de ruedas. \n";
        }
        if ($this->getAsistencia()){
            $cadena .= "Requiere asistencia para el embarque o desembarque. \n";
        }
        if ($this->getComida()){
            $cadena.= "Requiere comidas especiales para personas con alergias o restricciones alimentarias. \n";
        }
        return $cadena;
    }

    public function darPorcentajeIncremento(){
        if ($this->getSilla() && $this->getAsistencia() && $this->getComida()){
            $porcentaje = 30;
        }else {
            $porcentaje = 15;
        }
        return $porcentaje;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= $this->necesidadesAString();
        return $cadena;
    }
}