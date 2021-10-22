<?php

    // Array con el nombre de las monedas disponibles
    $listMonedas = array("EUR","USD","GBP","CHF","SEK","RUB","JPY" );

    // array con los valores de conversión de las monedas con el euro
    $cambio = array(
        "EUR" => 1.00,
        "USD" => 1.22,
        "GBP" => 0.91,
        "CHF" => 1.08,
        "SEK" => 10.10,
        "RUB" => 92.25,
        "JPY" => 126.60,
    );

    // función que calcula la conversion de una moneda a euros
    function convertirEUR(float $mon_fin, float $cantidad){
        $resultado = $cantidad * $mon_fin;
        return number_format($resultado, 2, ',', ' ');
    }

    // función que calcula la conversion entre 2 monedas cualquiera
    function convertirTodo(float $mon_or, float $mon_fin, float $cantidad){
        $resultado =  ($cantidad / $mon_or) * $mon_fin;
        return number_format($resultado, 2, ',', ' ');
    }

    // función para validar el número indicado como parametro da igual que se indique separando decimales con comas o con puntos
    function validarNumero( string $numero){
        $coma=strpos($numero, ','); // si hay una coma en el numero saco la posición
        if($coma != false) $numero[$coma]='.'; // modifico la coma por un punto para poder hacer los calculos y convertirlo a float sin perder datos

        $valor=floatval($numero);

        // si el valor no es valido retorno nulo y si lo es devuelvo la cifra modificada 
        if($valor == 0){
            return null;
        }
        else{
            return $valor;
        }
    }


?>