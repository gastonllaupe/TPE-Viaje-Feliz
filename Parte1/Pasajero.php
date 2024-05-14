<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDoc;

    public function __construct($nom,$ape,$doc){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->numeroDoc = $doc;
    }

    public function getNombre (){
        return $this->nombre ;
    }

    public function getApellido (){
        return $this->apellido ;
    }

    public function getNumeroDoc (){
        return $this->numeroDoc ;
    }

    public function setNombre ($nuevo){
        $this->nombre = $nuevo;
    }

    public function setApellido ($nuevo){
        $this->apellido = $nuevo;
    }

    public function setNumeroDoc ($nuevo){
        $this->numeroDoc = $nuevo;
    }

    public function __toString(){
        $cadena = "Nombre: " . $this->getNombre() . "\n";
        $cadena .= "Apellido: " . $this->getApellido() . "\n";
        $cadena .= "Numero de documento: " . $this->getNumeroDoc() . "\n";
        $cadena .= "Numero de telefono: " . $this->getTelefono() . "\n";
        return $cadena;
    }

}