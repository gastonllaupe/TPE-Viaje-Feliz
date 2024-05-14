<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDoc;
    private $telefono;
    private $numAsiento;
    private $numTicket;

    public function __construct($nom,$ape,$doc,$tel,$numA,$numT){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->numeroDoc = $doc;
        $this->telefono = $tel;
        $this->numAsiento = $numA;
        $this->numTicket = $numT;
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

    public function getTelefono(){
        return $this->telefono;
    }

    public function getAsiento(){
        return $this->numAsiento;
    }

    public function getTicket(){
        return $this->numTicket;
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

    public function setTelefono ($nuevo){
        $this->telefono = $nuevo;
    }

    public function setAsiento($nuevo){
        $this->numAsiento = $nuevo;
    }

    public function setTicket($nuevo){
        $this->numTicket = $nuevo;
    }

    public function darPorcentajeIncremento(){
        $porcentaje = 10;
        return $porcentaje;
    }

    public function __toString(){
        $cadena = "Nombre: " . $this->getNombre() . "\n";
        $cadena .= "Apellido: " . $this->getApellido() . "\n";
        $cadena .= "Numero de documento: " . $this->getNumeroDoc() . "\n";
        $cadena .= "Numero de telefono: " . $this->getTelefono() . "\n";
        $cadena .= "Numero de asiento: " . $this->getAsiento() . "\n";
        $cadena .= "Numero de ticket: " . $this->getTicket() . "\n";
        return $cadena;
    }
}