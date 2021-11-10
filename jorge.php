<?php

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */
/**
 * JORGE SEGURA, FAI-231, Tecnicatura en Desarrollo Web, jorge.segura@est.fi.uncoma.edu.ar, JS-FAI231
 * 
 */




/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Metodo que intenta resolver el punto 2 EXPLICACION 3
 * visualiza el menu de opciones y retona una opcion valida
 * @return $opcion //int
 */
function selectionarOpcion(){
    do{
        echo "INGRESE UNA OPCION"."\n";
        echo "1) Jugar al tateti"."\n";
        echo "2) Mostrar un juego"."\n";
        echo "3) Mostrar el primer juego ganador"."\n";
        echo "4) Mostrar porcentaje de Juegos ganados"."\n";
        echo "5) Mostrar resumen de Jugador"."\n";
        echo "6) Mostrar listado de juegos Ordenado por jugador O"."\n";
        echo "7) Salir"."\n";
        $opcion=trim(fgets(STDIN));
        if ( is_int($opcion) && !($opcion>0 && $opcion <8) ){
            echo "Opcion NO Valida."."\n";
        }
    } while ($opcion>0 && $opcion <8);
    return $opcion;
}

/**
 * Metodo que intenta resolver el punto 4 EXPLICACION 3
 * Dado un juego, muestra en pantalla los datos del juego.
 * @param array $unJuego
 * 
 */
function mostrarJuego ($unJuego){
    imprimirTableroTateti($unJuego);
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
function indicePrimerJuegoGanado($colJuegos, $nombreJugador){
    $indice = -1;
    $cantColJuegos=count($colJuegos);
    $i=0;
    $encontrado=FALSE;


    //recorro la coleccion de juegos hasta encontrar el nombre del Jugador
    while ($i<$cantColJuegos && !$encontrado){
        if ($colJuegos[$i]["jugadorCruz"]==$nombreJugador){ 
            if ($colJuegos[$i]["puntosCruz"] > $colJuegos[$i]["puntosCirculos"]){
                $encontrado=true;
                $indice=$i;
            }
        }elseif($colJuegos[$i]["jugadorCirculo"]==$nombreJugador){
            if ($colJuegos[$i]["puntosCirculo"] > $colJuegos[$i]["puntosCruz"]){
                $encontrado=true;
                $indice=$i;
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
function resumenJugador($colJuegos,$nombreJugador){
    //declaro el array asociativo inicial que contendrá el resumen.
    $resumen=[
        "nombre" => "",
        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0
    ];
    //declaro variables auxiliares para sumatorias y/o conteos
    $auxNombre="";
    $auxJuegosGanados=0;
    $auxJuegosPerdidos=0;
    $auxJuegosEmpatados=0;
    $auxPuntosAcumulados=0;


 
    //Recorro la colecction de Juegos y acumulo los valores segun nombre jugador.
    $cantColJuegos=count($colJuegos);

    for ($i=0; $i<$cantColJuegos; $i++){
        
        if ($colJuegos[$i]["jugadorCruz"]==$nombreJugador){ 
            $auxNombre=$nombreJugador;

            if ($colJuegos[$i]["puntosCruz"] > $colJuegos[$i]["puntosCirculos"]){           
               $auxJuegosGanados=$auxJuegosGanados+1;
               $auxPuntosAcumulados=$auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
            }
            if ($colJuegos[$i]["puntosCruz"] < $colJuegos[$i]["puntosCirculos"]){              
                $auxJuegosPerdidos=$auxJuegosPerdidos+1;
                $auxPuntosAcumulados=$auxPuntosAcumulados + $colJuegos[$i]["puntosCirculo"];
            }
            if ($colJuegos[$i]["puntosCruz"] == $colJuegos[$i]["puntosCirculos"]){              
                $auxJuegosEmpatados=$auxJuegosEmpatados+1;
                $auxPuntosAcumulados=$auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
            }
        }
        
        if($colJuegos[$i]["jugadorCirculo"]==$nombreJugador){
            $auxNombre=$nombreJugador;
            
            if ($colJuegos[$i]["puntosCruz"] < $colJuegos[$i]["puntosCirculos"]){           
                $auxJuegosGanados=$auxJuegosGanados+1;
                $auxPuntosAcumulados=$auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
             }
             if ($colJuegos[$i]["puntosCruz"] > $colJuegos[$i]["puntosCirculos"]){              
                 $auxJuegosPerdidos=$auxJuegosPerdidos+1;
                 $auxPuntosAcumulados=$auxPuntosAcumulados + $colJuegos[$i]["puntosCirculo"];
             }
             if ($colJuegos[$i]["puntosCruz"] == $colJuegos[$i]["puntosCirculos"]){              
                 $auxJuegosEmpatados=$auxJuegosEmpatados+1;
                 $auxPuntosAcumulados=$auxPuntosAcumulados + $colJuegos[$i]["puntosCruz"];
             }
        }
    }

    $resumen["nombre"]=$auxNombre;
    $resumen["juegosGanados"]= $auxJuegosGanados;
    $resumen["juegosPerdidos"]=$auxJuegosPerdidos;
    $resumen["juegosEmpatados"]=$auxJuegosEmpatados;
    $resumen["puntosAcumulados"]=$auxPuntosAcumulados;

    return $resumen;
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