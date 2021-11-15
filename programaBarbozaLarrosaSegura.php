<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */
/**
 * JORGE SEGURA, FAI-231, Técnicatura universitaria en Desarrollo Web, jorge.segura@est.fi.uncoma.edu.ar, JS-FAI231
 * FRANCISCO BARBOZA, FAI-3595, Técnicatura universitaria en desarrollo Web, francisco.barboza@est.fi.uncoma.edu.ar, FranciscoBarboza
 * ANDRES LARROSA, FAI-3601, Técnicatura universitaria en Desarrollo Web, andres.larrosa@est.fi.uncoma.edu.ar, andreslarrosa
 */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Metodo que intenta resolver el punto 2 EXPLICACION 3
 * visualiza el menu de opciones y retona una opcion valida
 * @return int
 */

function selectionarOpcion()
{
    $opcionValida = FALSE;
    do {
        echo "INGRESE UNA OPCION" . "\n";
        echo "1) Jugar al tateti" . "\n";
        echo "2) Mostrar un juego" . "\n";
        echo "3) Mostrar el primer juego ganador" . "\n";
        echo "4) Mostrar porcentaje de Juegos ganados" . "\n";
        echo "5) Mostrar resumen de Jugador" . "\n";
        echo "6) Mostrar listado de juegos Ordenado por jugador O" . "\n";
        echo "7) Salir" . "\n";
        $opcion = trim(fgets(STDIN));
        $opcionValida = (is_int($opcion) && ($opcion > 0 && $opcion < 8));
        if (!$opcionValida) {
            echo "Opcion NO Valida." . "\n";
        }
    } while (!$opcionValida);
    return $opcion;
}

/**
 * Metodo que intenta resolver el punto 4 EXPLICACION 3
 * Dado un juego, muestra en pantalla los datos del juego.
 * @param array $unJuego
 * 
 */
function mostrarJuego($colJuegos)
{
    $encontrado = false;
    $ganador = "";
    $cantidadDeJuegos = count($colJuegos);
    if ($cantidadDeJuegos == 0) {
        echo "No existen juegos en la coleccion \n";
    } else {
        do {
            echo "Ingrese un numero de juego: (1-" . $cantidadDeJuegos . ")";
            $numJuego = trim(fgets(STDIN));
            $encontrado = ($numJuego > 0 && $numJuego <= $cantidadDeJuegos);

            if ($encontrado) {

                $juego = $colJuegos[$numJuego - 1];
                if ($juego["puntosCruz"] == $juego["puntosCirculo"]) {
                    $ganador = "(empate)";
                } elseif (($juego["puntosCruz"] > $juego["puntosCirculo"])) {
                    $ganador = "(Gano X)";
                } else {
                    $ganador = "(Gano O)";
                }

                echo "****************************** \n";
                echo "Juego TATETI " . $numJuego . "  " . $ganador;
                echo "Jugador X: " . $juego["jugadorCruz"] . " obtuvo " . $juego["puntosCruz"] . " puntos \n";
                echo "Jugador O: " . $juego["jugadorCirculo"] . " obtuvo " . $juego["puntosCirculo"] . " puntos \n";
                echo "****************************** \n";
            } else {
                echo "El numero de juego no existe. \n ";
            }
        } while (!$encontrado);
    }
}

/**
 * Metodo que intenta resolver el punto 6 EXPLICACION 3
 * Dada una coleccion de juegos y nombre de un jugador, retorna el indice
 * del primer juego ganado, caso contrario, retorna -1
 * @param array $colJuegos
 * @param array $nombreJugador
 * @return int
 * 
 */
function indicePrimerJuegoGanado($colJuegos, $nombreJugador)
{
    $indice = -1;
    $cantColJuegos = count($colJuegos);
    $i = 0;
    $encontrado = FALSE;


    //recorro la coleccion de juegos hasta encontrar el nombre del Jugador
    while ($i < $cantColJuegos && !$encontrado) {
        if ($colJuegos[$i]["jugadorCruz"] == $nombreJugador) {
            if ($colJuegos[$i]["puntosCruz"] > $colJuegos[$i]["puntosCirculos"]) {
                $encontrado = true;
                $indice = $i;
            }
        } elseif ($colJuegos[$i]["jugadorCirculo"] == $nombreJugador) {
            if ($colJuegos[$i]["puntosCirculo"] > $colJuegos[$i]["puntosCruz"]) {
                $encontrado = true;
                $indice = $i;
            }
        }
        $i++;
    }
    return $indice;
}

/**
 * Metodo que intenta resolver el punto 7 EXPLICACIOn 3
 * Dada una coleccion de juegos y el nombre de un jugador, retorna el
 * resumen del jugador utilizando la estructura b) de la EXPLICACION 2.
 * @param array $colJuegos
 * @param array $nombreJugador
 * @return array
 * 
 */
function resumenJugador($colJuegos, $nombreJugador)
{
    //declaro el array asociativo inicial que contendrá el resumen.
    $resumen = [
        "nombre" => "",
        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0
    ];
    //declaro variables auxiliares para sumatorias y/o conteos
    $auxNombre = "";
    $auxJuegosGanados = 0;
    $auxJuegosPerdidos = 0;
    $auxJuegosEmpatados = 0;
    $auxPuntosAcumulados = 0;



    //Recorro la colecction de Juegos y acumulo los valores segun nombre jugador.
    $cantColJuegos = count($colJuegos);

    for ($i = 0; $i < $cantColJuegos; $i++) {

        if ($colJuegos[$i]["jugadorCruz"] == $nombreJugador) {
            $auxNombre = $nombreJugador;

            if ($colJuegos[$i]["puntosCruz"] > $colJuegos[$i]["puntosCirculos"]) {
                $auxJuegosGanados = $auxJuegosGanados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
            }
            if ($colJuegos[$i]["puntosCruz"] < $colJuegos[$i]["puntosCirculos"]) {
                $auxJuegosPerdidos = $auxJuegosPerdidos + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $colJuegos[$i]["puntosCirculo"];
            }
            if ($colJuegos[$i]["puntosCruz"] == $colJuegos[$i]["puntosCirculos"]) {
                $auxJuegosEmpatados = $auxJuegosEmpatados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
            }
        }

        if ($colJuegos[$i]["jugadorCirculo"] == $nombreJugador) {
            $auxNombre = $nombreJugador;

            if ($colJuegos[$i]["puntosCruz"] < $colJuegos[$i]["puntosCirculos"]) {
                $auxJuegosGanados = $auxJuegosGanados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
            }
            if ($colJuegos[$i]["puntosCruz"] > $colJuegos[$i]["puntosCirculos"]) {
                $auxJuegosPerdidos = $auxJuegosPerdidos + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $colJuegos[$i]["puntosCirculo"];
            }
            if ($colJuegos[$i]["puntosCruz"] == $colJuegos[$i]["puntosCirculos"]) {
                $auxJuegosEmpatados = $auxJuegosEmpatados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
            }
        }
    }

    $resumen["nombre"] = $auxNombre;
    $resumen["juegosGanados"] = $auxJuegosGanados;
    $resumen["juegosPerdidos"] = $auxJuegosPerdidos;
    $resumen["juegosEmpatados"] = $auxJuegosEmpatados;
    $resumen["puntosAcumulados"] = $auxPuntosAcumulados;

    return $resumen;
}

/**
 * Módulo que solicita al usuario el símbolo X o O y en caso correcto lo retorna ~ 8
 * @return string
 */

function validarSimbolo() {
    do {
        echo "Ingrese un símbolo X o O: ";
        $simboloValidar = strtoupper(trim(fgets(STDIN)));
        if ($simboloValidar != "X" && $simboloValidar != "O") {
            echo "Símbolo inválido\n";
        }
    } while ($simboloValidar != "X" && $simboloValidar != "O");
    return ($simboloValidar);
}


/**
 * Módulo que recibe una colección de juegos y retorna la cantidad de juegos ganados ~ 9
 * @param array $coleccionJuegos
 * @return int
 */

function totalJuegosGanados($coleccionJuegos) {

    // Inicializamos nuestra variable contadora que nos dirá la cantidad total de partidas ganadas, independiente de que jugador haya ganado.

    $cantidadDeJuegosGanadosTotales = 0;

    // Hay varias formas de resolverlo, poniendo que los puntos de uno son mayor al otro o viceversa.
    // Diferenciar el puntaje de 1 es lo mas fácil y optimizado para saber que uno de los 2 ganó.

    for ($i=0; $i < count($coleccionJuegos); $i++) {
        if ($coleccionJuegos[$i]["puntosCruz"] != 1) {
            $cantidadDeJuegosGanadosTotales++;
        }
    }
    return ($cantidadDeJuegosGanadosTotales);
}


/**
* Módulo que recibe una colección de juegos y un símbolo y retorna la cantidad de juegos ganados de ese símbolo ~ 10
* @param array $coleccionJuegos
* @param string $simbolo
* @return int
*/

function simboloJuegosGanados($coleccionJuegos, $simbolo) {

    // Inicializamos nuestro contador que nos va a indicar cuantas partidas ganó el símbolo elegido
    $cantidadDeJuegosGanadosSimbolo = 0;
 
    // Teniendo en cuenta el símbolo que se elija previamente verificado, X o O, le vamos sumando puntos a nuestra varaible contadora.
    // En este caso solo aumentará cuando el símbolo elegido haya ganado partidas, es decir que su puntaje es mayor a 1.
    // También se podría verificar si los puntos del jugador con el símbolo elegido sean mayor a los del otro.

    for ($i=0; $i < count($coleccionJuegos); $i++) {
        if ($simbolo == "X") {
            // if ($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCriculo"]) {}
            if ($coleccionJuegos[$i]["puntosCruz"] > 1) {
                $cantidadDeJuegosGanadosSimbolo++;
            }
        }
        else {
            // if ($coleccionJuegos[$i]["puntosCirculo"] > $coleccionJuegos[$i]["puntosCruz"]) {}
            if ($coleccionJuegos[$i]["puntosCirculo"] > 1) {
                $cantidadDeJuegosGanadosSimbolo++;
            }
        }
    }
    return ($cantidadDeJuegosGanadosSimbolo);
}

/**
 * Módulo que recibe una colección de juegos y los muestra ordenados alfabéticamente por el nombre del jugador Círculo ~ 11
 * @param array $coleccionJuegos
 */
function juegosOrdenadosParaJugadorO($coleccionJuegos) {

    // Ordenamos el array $coleccionJuegos de la manera expresada en la función ordenarNombresJugadorCirculo
    uasort($coleccionJuegos, "ordenarNombresJugadorCirculo");
    print_r($coleccionJuegos);
}

/**
 * Módulo que recibe 2 string de entrada y las ordena de menor a mayor, utilizado para ordenar por JugadorCirculo ~ 11
 * @param string $a
 * @param string $b
 * @return int
 */
function ordenarNombresJugadorCirculo($a,$b)
{
    // La manera en la que vamos a ordenar coleccionJuegos alfabéticamente por los nombres asignados a "jugadorCirculo"
    return strcmp($a["jugadorCirculo"], $b["jugadorCirculo"]);
}





/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/