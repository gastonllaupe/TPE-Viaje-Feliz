<?php
include_once 'Pasajero.php';
include 'Viaje.php';

$pasajero1 = new Pasajero ("Juan","Lopez","36561842");
$pasajero2 = new Pasajero ("Domingo","Gutierrez","31562841");
$pasajero3 = new Pasajero ("Damian","Robles","36561842");

$arregloPasajeros = [$pasajero1,$pasajero2,$pasajero3];
$viaje1 = new Viaje (37,"Bariloche",5,$arregloPasajeros);
$arregloViajes = [$viaje1];

function seleccionarOpcion(){
    echo "Seleccione una opción \n "; 
    echo "1) Cargar informacion de viaje \n" ;
    echo "2) Modificar informacion de un viaje \n" ;
    echo "3) Ver los datos de un viaje \n";
    echo "4) Salir \n";
    $opcion = elegirNumero(1,4);
    return $opcion;
}

function elegirNumero($min,$max){
    $numero = trim(fgets(STDIN));

    if(is_numeric($numero)){
        $numero = $numero * 1;
    }
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))){
        echo "Por favor ingrese un numero entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
        if (is_numeric($numero)){
            $numero = $numero * 1;
        }
    }
    return $numero;
    
}

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1 :
            echo "Introduzca el codigo del viaje: \n";
            $codigo = trim(fgets(STDIN));
            echo "Introduzca el destino del viaje: \n";
            $destino = trim(fgets(STDIN));
            echo "Introduzca la cantidad maxima de pasajeros: \n";
            $maxPas = trim(fgets(STDIN));
            $masPasajeros = true;
            $nuevoArrayPasajeros = [];
            while($masPasajeros == true && count($nuevoArrayPasajeros) <= $maxPas){
                echo "Introduzca el nombre del pasajero: \n";
                $pasajeNom = trim(fgets(STDIN));
                echo "Introduzca el apellido del pasajero \n";
                $pasajeApe = trim(fgets(STDIN));
                echo "Introduzca el DNI del pasajero \n";
                $pasaDni = trim(fgets(STDIN));
                $nuevoPasa = new Pasajero ($pasajeNom,$pasajeApe,$pasaDni);
                array_push($nuevoArrayPasajeros, $nuevoPasa);
                echo "Introducir otro pasajero? \n 1) Si \n 2) No \n" ;
                $opcion12 = elegirNumero(1,2);
                if ($opcion12 == 1){
                    $masPasajeros = false;
                }elseif ($opcion12 == 2){
                    $masPasajeros = false;
                }
            }
            $nuevoViaje = new Viaje ($codigo,$destino,$maxPas,$nuevoArrayPasajeros);
            array_push($arregloViajes,$nuevoViaje);
            echo "Viaje agregado \n";
            break;
        case 2 : 
            $maxArreglo = count($arregloViajes);
            echo "Ingrese el numero de viaje que quiere modificar \n" ;
            $numeroViaje = elegirNumero(1,$maxArreglo);
            $numeroViaje -= 1;
            echo "Que desea modificar? \n 1) El codigo de viaje \n 2) el destino del viaje \n 3) la cantidad maxima de pasajeros \n" ;
            $opcionMenu = elegirNumero(1,3);
            if ($opcionMenu == 1) {
                echo "Ingrese el codigo nuevo: \n";
                $nuevoCodigo = trim(fgets(STDIN));
                $arregloViajes[$numeroViaje]->setCodigo($nuevoCodigo);
            }elseif($opcionMenu == 2){
                echo "Ingrese el nuevo destino del viaje";
                $nuevoDestino = trim(fgets(STDIN));
                $arregloViajes[$numeroViaje]->setDestino($nuevoDestino);
            }elseif($opcionMenu == 3){
                echo "Ingrese la cantidad maxima de pasajeros";
                $nuevoMax = trim(fgets(STDIN));
                $arregloViajes[$numeroViaje]->setPasajeMax($nuevoMax);
            }
            break;
        case 3 : 
            $maxArreglo = count($arregloViajes);
            echo "Ingrese el numero de viaje que quiere ver \n"; //limite
            $numeroViaje = elegirNumero(1,$maxArreglo);
            $numeroViaje -= 1;
            echo $arregloViajes[$numeroViaje];


    }
} while ($opcion != 4);

echo "Adios!" ; 