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
 * inicializa una estructura de juegos con 10 ejemplos
 * @return array
 */
function cargarJuegos()
{
    // array $coleccionJuegos
    /*$coleccionJuegos[0] = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "PEPE", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz" => "CARLOS", "jugadorCirculo" => "MAJO", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[2] = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "JULIAN", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "JULIAN", "puntosCruz" => 0, "puntosCirculo" => 4];
    $coleccionJuegos[4] = ["jugadorCruz" => "MARCOS", "jugadorCirculo" => "PEPE", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegos[5] = ["jugadorCruz" => "MARCOS", "jugadorCirculo" => "DAVID", "puntosCruz" => 0, "puntosCirculo" => 3];
    $coleccionJuegos[6] = ["jugadorCruz" => "DAVID", "jugadorCirculo" => "MAJO", "puntosCruz" => 3, "puntosCirculo" => 0];
    $coleccionJuegos[7] = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 2];
    $coleccionJuegos[8] = ["jugadorCruz" => "MARCOS", "jugadorCirculo" => "DAVID", "puntosCruz" => 0, "puntosCirculo" => 3];
    $coleccionJuegos[9] = ["jugadorCruz" => "JULIAN", "jugadorCirculo" => "MAJO", "puntosCruz" => 3, "puntosCirculo" => 0];
    */
    $coleccionJuegos = [];

    $jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
    $jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
    $jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
    $jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
    $jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
    $jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
    $jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];

    array_push($coleccionJuegos, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);
    return $coleccionJuegos;
}


/**
 * Metodo que intenta resolver el punto 2 EXPLICACION 3
 * visualiza el menu de opciones y retona una opcion valida
 * @return int
 */

function selectionarOpcion()
{
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
        if (!(is_int($opcion)) && !($opcion >= 1 && $opcion <= 7)) {
            echo "Opcion NO Valida." . "\n";
        }
    } while (!(is_int($opcion)) && !($opcion >= 1 && $opcion <= 7));
    return $opcion;
}

/**
 * función que solicita al usuario un número entre un rango de valores. Si el número ~ 3
 * ingresado por el usuario no es válido, la función se encarga de volver a pedirlo. La función retorna un
 * número válido.
 * @param int $min
 * @param int $max
 * @return int
 */
function numeroEntre($min, $max){
    do {
        echo "Ingrese un numero entre " . $min . " y " . $max . ": ";
        $value= trim(fgets(STDIN));
        if (!(($min <= $value) && ($value <= $max))) {
            echo "El numero de juego no existe \n";
        }
    } while (!(($min <= $value) && ($value <= $max)));
    return $value;
}

/**
 * Metodo que intenta resolver el punto 4 EXPLICACION 3
 * Dado un juego, muestra en pantalla los datos del juego.
 * @param array $conjuntoJuegos
 * @param int $numJuego
 * 
 */
function mostrarJuego($conjuntoJuegos, $numJuego)
{
    $encontrado = false;
    $ganador = "";
    $cantidadDeJuegos = count($conjuntoJuegos);
    $encontrado = ($numJuego >= 0 && $numJuego <= $cantidadDeJuegos);

    if ($encontrado) {

        $juego = $conjuntoJuegos[$numJuego];
        if ($juego["puntosCruz"] == $juego["puntosCirculo"]) {
            $ganador = "(empate)";
        } elseif (($juego["puntosCruz"] > $juego["puntosCirculo"])) {
            $ganador = "(Gano X)";
        } else {
            $ganador = "(Gano O)";
        }

        echo "****************************** \n";
        echo "Juego TATETI " . $numJuego + 1 . "  " . $ganador . "\n";
        echo "Jugador X: " . $juego["jugadorCruz"] . " obtuvo " . $juego["puntosCruz"] . " puntos \n";
        echo "Jugador O: " . $juego["jugadorCirculo"] . " obtuvo " . $juego["puntosCirculo"] . " puntos \n";
        echo "****************************** \n";
    } else {
        echo "El numero de juego no existe. \n ";
    }
}

/**
 * Módulo que agrega un juego nuevo a una coleccion de juegos previa ~ 5
 * @param array $coleccionDeJuegos
 * @param array $juegoNuevo
 * @return array
 */
function agregarJuego($coleccionDeJuegos, $juegoNuevo)
{
    // entero $columnas
    $columnas = count($coleccionDeJuegos);
    $coleccionDeJuegos[$columnas] = $juegoNuevo;
    return $coleccionDeJuegos;
}

/**
 * Metodo que intenta resolver el punto 6 EXPLICACION 3
 * modulo que Dada una coleccion de juegos y nombre de un jugador, retorna el indice
 * del primer juego ganado, caso contrario, retorna -1
 * @param array $conjuntoDeJuegos
 * @param array $nombreJugador
 * @return int
 * 
 */
function indicePrimerJuegoGanado($conjuntoDeJuegos, $nombreJugador)
{
    $indice = -1;
    $cantColJuegos = count($conjuntoDeJuegos);
    $i = 0;
    $encontro = FALSE;


    //recorro la coleccion de juegos hasta encontrar el nombre del Jugador
    while ($i < $cantColJuegos && !$encontro) {
        if ($conjuntoDeJuegos[$i]["jugadorCruz"] == $nombreJugador) {
            if ($conjuntoDeJuegos[$i]["puntosCruz"] > $conjuntoDeJuegos[$i]["puntosCirculo"]) {
                $encontro = true;
                $indice = $i;
            }
        } elseif ($conjuntoDeJuegos[$i]["jugadorCirculo"] == $nombreJugador) {
            if ($conjuntoDeJuegos[$i]["puntosCirculo"] > $conjuntoDeJuegos[$i]["puntosCruz"]) {
                $encontro = true;
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
 * @param array $listadoJuegos
 * @param array $nombreDelJugador
 * @return array
 * 
 */
function resumenJugador($listadoJuegos, $nombreDelJugador)
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
    $cantColeccionJuegos = count($listadoJuegos);

    for ($j = 0; $j < $cantColeccionJuegos; $j++) {

        if ($listadoJuegos[$j]["jugadorCruz"] == $nombreDelJugador) {
            $auxNombre = $nombreDelJugador;

            if ($listadoJuegos[$j]["puntosCruz"] > $listadoJuegos[$j]["puntosCirculo"]) {
                //cantidad de juegos ganados
                $auxJuegosGanados = $auxJuegosGanados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $listadoJuegos[$j]["puntosCruz"];
            }
            if ($listadoJuegos[$j]["puntosCruz"] < $listadoJuegos[$j]["puntosCirculo"]) {
                //cantidad juegos perdidos
                $auxJuegosPerdidos = $auxJuegosPerdidos + 1;
            }
            if ($listadoJuegos[$j]["puntosCruz"] == $listadoJuegos[$j]["puntosCirculo"]) {
                //cantidad juegos empatados
                $auxJuegosEmpatados = $auxJuegosEmpatados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $listadoJuegos[$j]["puntosCruz"];
            }
        }

        if ($listadoJuegos[$j]["jugadorCirculo"] == $nombreDelJugador) {
            $auxNombre = $nombreDelJugador;

            if ($listadoJuegos[$j]["puntosCruz"] < $listadoJuegos[$j]["puntosCirculo"]) {
                $auxJuegosGanados = $auxJuegosGanados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $listadoJuegos[$j]["puntosCirculo"];
            }
            if ($listadoJuegos[$j]["puntosCruz"] > $listadoJuegos[$j]["puntosCirculo"]) {
                $auxJuegosPerdidos = $auxJuegosPerdidos + 1;
            }
            if ($listadoJuegos[$j]["puntosCruz"] == $listadoJuegos[$j]["puntosCirculo"]) {
                $auxJuegosEmpatados = $auxJuegosEmpatados + 1;
                $auxPuntosAcumulados = $auxPuntosAcumulados + $listadoJuegos[$j]["puntosCirculo"];
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
 * Metodo que muestra el resumen de un jugador, recibe un resumen y lo muestra por pantalla
 * @param array $resumen
 * 
 */
function auxMostrarResumen($resumen){
    echo "****************************** \n";
    echo "Jugador: ".$resumen["nombre"]."\n";
    echo "Ganó: ".$resumen["juegosGanados"]." juegos \n";
    echo "Perdió: ".$resumen["juegosPerdidos"]." juegos \n";
    echo "Empató: ".$resumen["juegosEmpatados"]." juegos \n";
    echo "Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos \n";
    echo "****************************** \n";
}

/**
 * Módulo que solicita al usuario el símbolo X o O y en caso correcto lo retorna ~ 8
 * @return string
 */

function validarSimbolo()
{
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
 * @param array $colecJuegos
 * @return int
 */

function totalJuegosGanados($colecJuegos)
{

    // Inicializamos nuestra variable contadora que nos dirá la cantidad total de partidas ganadas, independiente de que jugador haya ganado.

    $cantidadDeJuegosGanadosTotales = 0;

    // Hay varias formas de resolverlo, poniendo que los puntos de uno son mayor al otro o viceversa.
    // Diferenciar el puntaje de 1 es lo mas fácil y optimizado para saber que uno de los 2 ganó.

    for ($k = 0; $k < count($colecJuegos); $k++) {
        if ($colecJuegos[$k]["puntosCruz"] != 1) {
            $cantidadDeJuegosGanadosTotales++;
        }
    }
    return ($cantidadDeJuegosGanadosTotales);
}


/**
 * Módulo que recibe una colección de juegos y un símbolo y retorna la cantidad de juegos ganados de ese símbolo ~ 10
 * @param array $colecDeJuegos
 * @param string $simbolo
 * @return int
 */

function simboloJuegosGanados($colecDeJuegos, $simbolo)
{

    // Inicializamos nuestro contador que nos va a indicar cuantas partidas ganó el símbolo elegido
    $cantidadDeJuegosGanadosSimbolo = 0;

    // Teniendo en cuenta el símbolo que se elija previamente verificado, X o O, le vamos sumando puntos a nuestra varaible contadora.
    // En este caso solo aumentará cuando el símbolo elegido haya ganado partidas, es decir que su puntaje es mayor a 1.
    // También se podría verificar si los puntos del jugador con el símbolo elegido sean mayor a los del otro.

    for ($z = 0; $z < count($colecDeJuegos); $z++) {
        if ($simbolo == "X") {
            // if ($colecDeJuegos[$z]["puntosCruz"] > $colecDeJuegos[$z]["puntosCriculo"]) {}
            if ($colecDeJuegos[$z]["puntosCruz"] > 1) {
                $cantidadDeJuegosGanadosSimbolo++;
            }
        } else {
            // if ($colecDeJuegos[$z]["puntosCirculo"] > $colecDeJuegos[$z]["puntosCruz"]) {}
            if ($colecDeJuegos[$z]["puntosCirculo"] > 1) {
                $cantidadDeJuegosGanadosSimbolo++;
            }
        }
    }
    return ($cantidadDeJuegosGanadosSimbolo);
}

/**
 * Módulo que recibe una colección de juegos y los muestra ordenados alfabéticamente por el nombre del jugador Círculo ~ 11
 * @param array $colDeJuegos
 */
function juegosOrdenadosParaJugadorO($colDeJuegos)
{

    // Ordenamos el array $colDeJuegos de la manera expresada en la función ordenarNombresJugadorCirculo
    uasort($colDeJuegos, "ordenarNombresJugadorCirculo");
    print_r($colDeJuegos);
}

/**
 * Módulo que recibe 2 string de entrada y las ordena de menor a mayor, utilizado para ordenar por JugadorCirculo ~ 11
 * @param string $a
 * @param string $b
 * @return int
 */
function ordenarNombresJugadorCirculo($a, $b)
{
    // La manera en la que vamos a ordenar coleccionJuegos alfabéticamente por los nombres asignados a "jugadorCirculo"
    return strcmp($a["jugadorCirculo"], $b["jugadorCirculo"]);
}

/**
 * Módulo verificador que busca un jugador por el nombre ingresado en la colección de juegos, en caso de estar retorna 1, en caso de no retorna -1
 * @param array $colJuegos
 * @param string $jugadorNombre
 * @return int
 */
function jugadorJugoConNombre($colJuegos, $jugadorNombre) {
    $cantidadJuegos = count($colJuegos);
    $jugadorEncontrado = -1;
    $x = 0;
    do {
        if ($colJuegos[$x]["jugadorCruz"] == $jugadorNombre || $colJuegos[$x]["jugadorCirculo"] == $jugadorNombre) {
            $jugadorEncontrado = 1;
        }
        $x++;
    } while ($x < $cantidadJuegos && $jugadorEncontrado <> 1);
    return($jugadorEncontrado);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/
// Programa para jugar al tateti, con menú de opciones para visualizar partidas y estadísticas particulares.
// PROGRAMA teteti

//Declaración de variables:
// ENTERO respuesta, juegoABuscar, jugadorEnPartidas, indiceDelPrimerJuegoGanado, cantJuegosGanados, cantTotalDeJuegos, jugadorExiste
// FLOAT porcentaje
// ARRAY nuevoJuego, listaDeJuegos
// STRING nombreJugadorABuscar, simbolo, nombre

//Inicialización de variables:
// Cargamos 10 juegos a nuestra lista de juegos, para tener una base
$listaDeJuegos = cargarJuegos();

//Proceso:
do {
    $respuesta = selectionarOpcion();
    switch ($respuesta) {
        case 1:
            // Ejecutamos las funciones de tateti.php para inciar un juego y guardamos el resultado en el array asociativo $nuevoJuego
            $nuevoJuego = jugar();
            // Una vez completado el juego y guardado el resultado lo agregamos a nuestra base de datos donde están todos nuestros juegos
            $listaDeJuegos = agregarJuego($listaDeJuegos, $nuevoJuego);
            break;
        case 2:
            // Solicitamos un número de juego y después de validarlo lo buscamos dentro de la lista de juegos.
            $juegoABuscar = numeroEntre(1, count($listaDeJuegos));
            mostrarJuego($listaDeJuegos, ($juegoABuscar - 1));
            break;
        case 3:
            // Mostramos el primer juego que ganó el jugador que ingresa el usuario.
            echo "Ingrese el nombre del jugador a buscar: ";
            // Lo guardamos como lo ingresa el usuario, para mostrarlo de la misma manera mas adelante
            $nombreJugadorABuscar = trim(fgets(STDIN));

            // Cuando queremos buscar el jugador lo enviamos a la función en mayúscula ya que
            // todos los nombres en la base de datos están ingresados en mayúscula.
            $jugadorEnPartidas = jugadorJugoConNombre($listaDeJuegos, strtoupper($nombreJugadorABuscar));

            // Verificamos si el jugador participó de algun juego según el nombre ingresado
            if ($jugadorEnPartidas == 1) {
                $indiceDelPrimerJuegoGanado = indicePrimerJuegoGanado($listaDeJuegos, strtoupper($nombreJugadorABuscar));
                if ($indiceDelPrimerJuegoGanado == -1) {
                    echo "El jugador " . $nombreJugadorABuscar . " no ganó ningún juego\n";
                } 
                else {
                    mostrarJuego($listaDeJuegos, $indiceDelPrimerJuegoGanado);
                }
            }
            else {
                echo "El jugador " . $nombreJugadorABuscar . " no participó de ningún juego\n";
            }
            
            break;
        case 4:
            // Se le solicita al usuario que elija uno de los símbolos (X o O), y
            // se muestra qué porcentaje ganó en relación a todos los juegos ganados.
            $simbolo=validarSimbolo();
            $cantJuegosGanados=simboloJuegosGanados($listaDeJuegos,$simbolo);
            $cantTotalDeJuegos=totalJuegosGanados($listaDeJuegos);
            $porcentaje=($cantJuegosGanados/$cantTotalDeJuegos)*100;
            echo $simbolo." ganó el ".$porcentaje."% de juegos ganados.\n";
            break;
        case 5:
            // Se le solicita al usuario un nombre de jugador y se muestra en pantalla
            // un resumen de los juegos ganados, los juegos perdidos, empates y puntos acumulados.
            echo "Ingrese el nombre de un jugador: ";
            $nombre = trim(fgets(STDIN));

            // Comprobamos si el nombre del jugador ingresado se encuentra en alguno de los juegos almacenados.
            // Si existe, retorna 1 y sino retorna -1.
            $jugadorExiste = jugadorJugoConNombre($listaDeJuegos, strtoupper($nombre));

            if ($jugadorExiste == 1) {
                auxMostrarResumen(resumenJugador($listaDeJuegos, strtoupper($nombre)));
            }
            else {
                echo "El jugador ". $nombre . " no jugó ninguna partida.\n";
            }
            break;
        case 6:
            // Se mostrará en pantalla la estructura ordenada alfabéticamente por jugador O,
            // utilizando la función predefinida uasort de php, y la función predefinida print_r.
            juegosOrdenadosParaJugadorO($listaDeJuegos);
            break;
         case 7:
            // Muestra un cartel de finalizacion de programa
            echo "FINALIZO EL PROGRAMA.";
            break;
    }
} while ($respuesta != 7);

