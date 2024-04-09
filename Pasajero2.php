<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDoc;
    private $telefono;

    public function __construct($nom,$ape,$doc,$tel){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->numeroDoc = $doc;
        $this->telefono = $tel;
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

}