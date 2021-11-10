<?php


// 8.
/**
 * Módulo que solicita al usuario el símbolo X o O y en caso correcto lo retorna
 * @return string
 */

function validarSimbolo() {
    $simbolo = "a";
    while ($simbolo != "X" && $simbolo != "O") {
        echo "Ingrese un símbolo X o O: ";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if ($simbolo != "X" && $simbolo != "O") {
            echo "Símbolo inválido\n";
        }
    }
    return ($simbolo);
}


// 9.
/**
 * Módulo que recibe una colección de juegos y retorna la cantidad de juegos ganados
 * @param array $coleccionJuegos
 * @return int
 */

function totalJuegosGanados($coleccionJuegos) {
    $cantidadDeJuegosGanadosTotales = 0;
    for ($i=0; $i < count($coleccionJuegos); $i++) {
        if ($coleccionJuegos[$i]["puntosCruz"] != 1) {
            $cantidadDeJuegosGanadosTotales++;
        }
    }
    return ($cantidadDeJuegosGanadosTotales);
}


// 10.
/**
* Módulo que recibe una colección de juegos y un símbolo y retorna la cantidad de juegos ganados de ese símbolo
* @param array $coleccionJuegos
* @param string $simbolo
* @return int
*/

function simboloJuegosGanados($coleccionJuegos, $simbolo) {
    $cantidadDeJuegosGanadosSimbolo = 0;
    for ($i=0; $i < count($coleccionJuegos); $i++) {
        if ($simbolo == "X") {
            if ($coleccionJuegos[$i]["puntosCruz"] > 1) {
                $cantidadDeJuegosGanadosSimbolo++;
            }
        }
        else {
            if ($coleccionJuegos[$i]["puntosCirculo"] > 1) {
                $cantidadDeJuegosGanadosSimbolo++;
            }
        }
    }
    return ($cantidadDeJuegosGanadosSimbolo);
}

// 11.
/**
 * Módulo que recibe una colección de juegos y los muestra ordenados alfabéticamente por el nombre del jugador Círculo
 * @param array $coleccionJuegos
 */
function juegosOrdenadosParaJugadorO($coleccionJuegos) {
    uasort($coleccionJuegos, "ordenarNombresJugadorCirculo");
    print_r($coleccionJuegos);
}

/**
 * Módulo que recibe 2 string de entrada y las ordena de menor a mayor
 * @param string $a
 * @param string $b
 * @return int
 */
function ordenarNombresJugadorCirculo($a,$b)
{
  return strcmp($a["jugadorCirculo"], $b["jugadorCirculo"]);
}