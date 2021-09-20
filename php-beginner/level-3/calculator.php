<?php

$operatie = readline('Welke operatie wil je uitvoeren? (+ of -) ');

if ($operatie == '+') {
    $getal1 = readline('Eerst getal? '); 
    $getal2 = readline('Tweede getal? '); 
    echo "Uw resultaat is " . ($getal1 + $getal2);
} else {
    $getal3 = readline('Eerst getal? '); 
    $getal4 = readline('Tweede getal? '); 
    echo "Uw resultaat is " . ($getal3 - $getal4); 
}

?>

    