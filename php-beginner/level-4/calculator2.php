<?php

$operatie = readline('Welke operatie wil je uitvoeren? (+, -, %) ');

if ($operatie == '+' || $operatie == '-' || $operatie == '&') {
    
    $getal1 = readline('Eerst getal? ');

    if (!is_numeric($getal1)) {
        exit("Dit is geen getal");
    } else {
        $getal2 = readline('Tweede getal? '); 
    }
    if (!is_numeric($getal2)) {
        exit("Dit is geen getal");
    } 
    if ($operatie == '%' && $getal2 == 0) {
        exit("Dit is geen geldige berekening" . PHP_EOL);
    }

    if ($operatie == '+') {
        echo "Uw resultaat is: " . ($getal1 + $getal2) . PHP_EOL;
    } 
    if ($operatie == '-') {
        echo "Uw resultaat is: " . ($getal1 - $getal2);
    } 
    if ($operatie == '%') {
        echo "Uw resultaat is: " . ($getal1 % $getal2);
    } 

} else {
    echo "Geen geldige operatie" . PHP_EOL;
}

?>