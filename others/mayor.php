<?php

$numbers = [5, 3, 9, 2, 1, 7, 2, 6, 4, 8, 11, 10];
var_dump("Mayor a Menor: ", ordenarMayorMenor($numbers));
var_dump("Mayor: ", mayor($numbers));
longitud($numbers);
primos($numbers);

function ordenarMayorMenor($numbers) {
    for ($i = 0; $i < count($numbers); $i++) {
         for ($j = 0; $j < count($numbers); $j++) {
            if ($numbers[$j] < $numbers[$j + 1]) {
                $auxiliar = $numbers[$j];
                $numbers[$j] = $numbers[$j + 1];
                $numbers[$j + 1] = $auxiliar;
            }
         }
    }
    
    return $numbers;
}

function mayor($numbers) {
    $mayor = $numbers[0];
    for ($i = 0; $i < count($numbers); $i++) {
         if ($numbers[$i] > $mayor) {
             $mayor = $numbers[$i];
         }
    }
    
    return $mayor;
}

function longitud($numbers) {
    var_dump("Longitud: ", count($numbers));
}

function primos($numbers) {
    $primos = array();
    $mayor = mayor($numbers);
    
    for ($i = 0; $i < count($numbers); $i++) {
         if ($numbers[$i] > 1) {
            $count = 0;
            
            for ($j = 2; $j <= $mayor; $j++) {
                if ($numbers[$i] % $j == 0) {
                    $count++;
                }
            }
            
            if ($count == 1) {
                array_push($primos, $numbers[$i]);
            }
        }
    }
    
    var_dump("Primos: ", ordenarMayorMenor($primos));
}