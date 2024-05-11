<?php
class ResponsableV {
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($num,$numLic,$nom,$ape){
        $this->numeroEmpleado = $num;
        $this->numeroLicencia = $numLic;
        $this->nombre = $nom;
        $this->apellido = $ape;
    }

    public function getNumero (){
        return $this->numeroEmpleado;
    }

    public function getLicencia (){
        return $this->numeroLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setNumero ($nuevo){
        $this->numeroEmpleado = $nuevo;
    }

    public function setLicencia ($nuevo){
        $this->numeroLicencia = $nuevo;
    }

    public function setNombre ($nuevo){
        $this->nombre = $nuevo;
    }

    public function setApellido ($nuevo){
        $this->apellido = $nuevo;
    }

    public function __toString(){
        $cadena = "Numero de empleado: " . $this->getNumero() . "\n";
        $cadena .= "Numero de licencia: " . $this->getLicencia() . "\n";
        $cadena .= "Nombre: " . $this->getNombre() . "\n";
        $cadena .= "Apellido: " . $this->getApellido() . "\n";

        return $cadena;
    }
}