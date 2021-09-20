<?php

$operatie = readline('Welke operatie wil je uitvoeren? (+, -, %) ');

if ($operatie == '+') {
    { 
    $getal1 = readline('Eerst getal? ');
    }
    if (is_numeric($getal1) == false) {
        exit("Dit is geen getal");
    } else {
        $getal2 = readline('Tweede getal? '); 
    }
    if (is_numeric($getal2) == false) {
        exit("Dit is geen getal");
    } else {
        echo "Uw resultaat is: " . ($getal1 + $getal2);
    }
} else if ($operatie == '-') {
    { 
    $getal3 = readline('Eerst getal? ');
    }
    if (is_numeric($getal3) == false) {
        exit("Dit is geen getal");
    } else {
        $getal4 = readline('Tweede getal? '); 
    }
    if (is_numeric($getal4) == false) {
        exit("Dit is geen getal");
    } else {
        echo "Uw resultaat is: " . ($getal3 - $getal4);
    }
} else if ($operatie == '%') { 
    {
    $getal5 = readline('Eerst getal? ');
    }
    if (is_numeric($getal5) == false) {
        exit("Dit is geen getal");
    } else {
        $getal6 = readline('Tweede getal? '); 
    }
    if (is_numeric($getal6) == false) {
        exit("Dit is geen getal");
    } else {
        echo "Uw resultaat is: " . ($getal5 % $getal6);
    }
} else {
    echo "Geen geldige operatie";
}



?>

    