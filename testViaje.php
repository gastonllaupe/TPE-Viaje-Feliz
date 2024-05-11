<?php
include_once 'Pasajero.php';
include 'Viaje.php';
include_once 'ResponsableV.php';

$pasajero1 = new Pasajero ("Juan","Lopez","36561842","15326585");
$pasajero2 = new Pasajero ("Domingo","Gutierrez","31562841","15584796");
$pasajero3 = new Pasajero ("Damian","Robles","36561842","15467985");

$responsable1 = new ResponsableV (1,22,"Juan","Gomez");

$arregloPasajeros = [$pasajero1,$pasajero2,$pasajero3];
$viaje1 = new Viaje (37,"Bariloche",5,$arregloPasajeros,$responsable1);
$arregloViajes = [$viaje1];

function seleccionarOpcion(){
    echo "Seleccione una opción \n"; 
    echo "1) Cargar informacion de viaje \n" ;
    echo "2) Modificar informacion de un viaje \n" ;
    echo "3) Ver los datos de un viaje \n";
    echo "4) Modificar datos de pasajeros \n";
    echo "5) Agregar pasajeros a un viaje \n" ;
    echo "6) Cargar informacion del responsable del viaje \n";
    echo "7) Salir \n";
    $opcion = elegirNumero(1,7);
    return $opcion;
}

function elegirNumero($min,$max){
    $numero = trim(fgets(STDIN));

    if(is_numeric($numero)){
        $numero = $numero * 1;
    }
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))){
        echo "Por favor ingrese un numero entre " . $min . " y " . $max . ": \n";
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
        case 1 : // cargar informacion de un viaje
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
                echo "Introduzca el telefono del pasajero \n";
                $pasaTel = trim(fgets(STDIN));
                $nuevoPasa = new Pasajero ($pasajeNom,$pasajeApe,$pasaDni,$pasaTel);
                array_push($nuevoArrayPasajeros, $nuevoPasa);
                echo "Introducir otro pasajero? \n 1) Si \n 2) No \n" ;
                $opcion12 = elegirNumero(1,2);
                if ($opcion12 == 1){
                    $masPasajeros = true;
                }elseif ($opcion12 == 2){
                    $masPasajeros = false;
                }
            }
            echo "Introduzca el nombre del responsable del viaje \n";
            $respoNo = trim(fgets(STDIN));
            echo "Introduzca el apellido del responsable del viaje \n";
            $respoA = trim(fgets(STDIN));
            echo "Introduzca el numero de empleado \n";
            $respoN = trim(fgets(STDIN));
            echo "Introduzca el numero de Licencia \n";
            $respoL = trim(fgets(STDIN));
            $nuevoRespo = new ResponsableV ($respoN,$respoL,$respoNo,$respoA);
            $nuevoViaje = new Viaje ($codigo,$destino,$maxPas,$nuevoArrayPasajeros,$nuevoRespo);
            array_push($arregloViajes,$nuevoViaje);
            echo "Viaje agregado \n";
            break;
        case 2 :  //modificar informacion de un viaje
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
                echo "Ingrese el nuevo destino del viaje \n";
                $nuevoDestino = trim(fgets(STDIN));
                $arregloViajes[$numeroViaje]->setDestino($nuevoDestino);
            }elseif($opcionMenu == 3){
                echo "Ingrese la cantidad maxima de pasajeros \n";
                $nuevoMax = trim(fgets(STDIN));
                $arregloViajes[$numeroViaje]->setPasajeMax($nuevoMax);
            }
            echo "Cambios realizados con exito \n";
            break;
        case 3 : //ver los datos de un viaje
            $maxArreglo = count($arregloViajes);
            echo "Ingrese el numero de viaje que quiere ver \n"; 
            $numeroViaje = elegirNumero(1,$maxArreglo);
            $numeroViaje -= 1;
            echo $arregloViajes[$numeroViaje];
            break;
        case 4 : //modificar los datos de un pasajero
            $maxArreglo = count($arregloViajes);
            echo "Ingrese el numero de viaje del pasajero a editar \n"; 
            $numeroViaje = elegirNumero(1,$maxArreglo);
            $numeroViaje -= 1;
            $esteArregloPasajeros = $arregloViajes[$numeroViaje]->getPasajeros();
            echo "Elija el numero de pasajero que quiere modificar \n";
            $numeroPasajero = elegirNumero(1,count($esteArregloPasajeros));
            $numeroPasajero -=1;
            echo "Ingrese un nuevo nombre \n";
            $nuevoNombre = trim(fgets(STDIN));
            echo "Ingrese nuevo apellido \n";
            $nuevoApellido = trim(fgets(STDIN));
            echo "Ingrese nuevo telefono \n";
            $nuevoTelefono =trim(fgets(STDIN));
            $esteArregloPasajeros[$numeroPasajero]->setNombre($nuevoNombre);
            $esteArregloPasajeros[$numeroPasajero]->setApellido($nuevoApellido);
            $esteArregloPasajeros[$numeroPasajero]->setTelefono($nuevoTelefono);
            echo "Cambios realizados con exito. \n";
            break;
        case 5 : //agregar pasajeros a un viaje
            $maxArreglo = count($arregloViajes);
            echo "Ingrese el numero de viaje al que quiere agregar pasajeros \n"; 
            $numeroViaje = elegirNumero(1,$maxArreglo);
            $numeroViaje -= 1;
            $masPasajeros = true;
            $esteArregloPasajeros = $arregloViajes[$numeroViaje]->getPasajeros();
            $esteMaxPas = $arregloViajes[$numeroViaje]->getPasajeMax();
            while($masPasajeros == true && count($esteArregloPasajeros) < $esteMaxPas){
                echo "Introduzca el nombre del pasajero: \n";
                $pasajeNom = trim(fgets(STDIN));
                echo "Introduzca el apellido del pasajero \n";
                $pasajeApe = trim(fgets(STDIN));
                echo "Introduzca el DNI del pasajero \n";
                $pasaDni = trim(fgets(STDIN));
                echo "Introduzca el telefono del pasajero \n";
                $pasaTel = trim(fgets(STDIN));
                if(!$arregloViajes[$numeroViaje]->pasajeroExiste($pasaDni)){
                    $nuevoPasa = new Pasajero ($pasajeNom,$pasajeApe,$pasaDni,$pasaTel);
                    array_push($esteArregloPasajeros, $nuevoPasa);
                    $arregloViajes[$numeroViaje]->setPasajeros($esteArregloPasajeros);
                }else {
                    echo "Este pasajero ya existe. \n";
                }
                echo "Introducir otro pasajero? \n 1) Si \n 2) No \n" ;
                $opcion12 = elegirNumero(1,2);
                if ($opcion12 == 1){
                    $masPasajeros = true;
                }elseif ($opcion12 == 2){
                    $masPasajeros = false;
                }
            }
            if (count($esteArregloPasajeros) >= $esteMaxPas){
                echo "Cantidad maxima de pasajeros alcanzada \n";
            }
            break;
        case 6 : // modificar el responsable de un viaje
            $maxArreglo = count($arregloViajes);
            echo "Ingrese el numero de viaje al que quiere ver su responsable \n"; 
            $numeroViaje = elegirNumero(1,$maxArreglo);
            $numeroViaje -= 1;
            echo "El responsable a modificar es: " . $arregloViajes[$numeroViaje]->getResponsable() ."\n";
            echo "Introduzca el nombre del responsable del viaje \n";
            $respoNo = trim(fgets(STDIN));
            echo "Introduzca el apellido del responsable del viaje \n";
            $respoA = trim(fgets(STDIN));
            echo "Introduzca el numero de empleado \n";
            $respoN = trim(fgets(STDIN));
            echo "Introduzca el numero de Licencia \n";
            $respoL = trim(fgets(STDIN));
            $respoCambio = $arregloViajes[$numeroViaje]->getResponsable();
            $respoCambio->setNumero($respoN);
            $respoCambio->setLicencia($respoL);
            $respoCambio->setNombre($respoNo);
            $respoCambio->setApellido($respoA);
            echo "Cambios realizados con exito, el nuevo responsable es: " . $arregloViajes[$numeroViaje]->getResponsable() . "\n";
            break;
    }
} while ($opcion != 7);

echo "Adios!" ; 