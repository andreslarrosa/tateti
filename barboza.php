<?php 
/**
 * inicializa una estructura de juegos con 10 ejemplos
 */
function cargarJuegos(){
    // array $coleccionJuegos
    $coleccionJuegos[0] = ["jugadorCruz"=> "MAJO" , "jugadorCirculo" => "PEPE", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz"=> "CARLOS" , "jugadorCirculo" => "MAJO", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccionJuegos[2] = ["jugadorCruz"=> "MAJO" , "jugadorCirculo" => "JULIAN", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz"=> "PEPE" , "jugadorCirculo" => "JULIAN", "puntosCruz"=> 0, "puntosCirculo" => 4];
    $coleccionJuegos[4] = ["jugadorCruz"=> "MARCOS" , "jugadorCirculo" => "PEPE", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[5] = ["jugadorCruz"=> "MARCOS" , "jugadorCirculo" => "DAVID", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccionJuegos[6] = ["jugadorCruz"=> "DAVID" , "jugadorCirculo" => "MAJO", "puntosCruz"=> 3, "puntosCirculo" => 0];
    $coleccionJuegos[7] = ["jugadorCruz"=> "MAJO" , "jugadorCirculo" => "PEPE", "puntosCruz"=> 0, "puntosCirculo" => 2];
    $coleccionJuegos[8] = ["jugadorCruz"=> "MARCOS" , "jugadorCirculo" => "DAVID", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccionJuegos[9] = ["jugadorCruz"=> "JULIAN" , "jugadorCirculo" => "MAJO", "puntosCruz"=> 3, "puntosCirculo" => 0];
    return $coleccionJuegos;
}

/**
 * funcion que muestra el menu y solicita numero valido de alguna opcion
 * vuelve a pedir el numero en caso de ingresar uno incorrecto o no valido
 * @return int
 */
function seleccionarOpcion(){
    // ENTERO $opcion
    echo "MENU DE OPCIONES, \n";
    echo "    1) Jugar al tateti.\n";
    echo "    2) Mostrar un juego. \n";
    echo "    3) Mostrar el primer juego ganador. \n";
    echo "    4) Mostrar porcentajes de juegos ganados. \n";
    echo "    5) Mostrar resumen de jugador.\n";
    echo "    6) Mostrar listado de juegos ordenados por jugador O.\n";
    echo "    7) Salir.\n";  
    
    //validacion en caso de no ingresar un numero correcto
    
    $opcion= trim(fgets(STDIN));
    while (!(is_int($opcion)) && !($opcion >= 1 && $opcion <= 7)) {
        echo "error: ingrese un numero que corresponda a las opciones: ";
        $opcion= trim(fgets(STDIN));
    }
    return $opcion;
} 

/**
 * Implementar una función que solicite al usuario un número entre un rango de valores. Si el número 
 * ingresado por el usuario no es válido, la función se encarga de volver a pedirlo. La función retorna un
 * número válido.
 * @param int $min
 * @param int $max
 * @return int
 */
function numeroEntre($min, $max,){
    // ENTERO $value 
    echo "ingrese un numero entre " . $min . " y " . $max . ": ";
    $value= trim(fgets(STDIN));
    if (!(($min <= $value) && ($value <= $max))) {
        while (!(($min <= $value) && ($value <= $max))) {
            echo "error: ingrese un numero entre " . $min . " y " . $max . ": ";
            $value= trim(fgets(STDIN));
        }
    } 
    "ingrese un numero entre " . $min . " y " . $max . ": ";
    return $value;    
}

$prueba= numeroEntre(1, 3);

echo $prueba;

function agregarJuego(){
    
}