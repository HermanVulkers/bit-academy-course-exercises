<?php
//Input getal invoeren
$input = readline('Van welk getal wil je de faculteit weten? ');
//Fac geven we 1, omdat we straks met 1*i beginnen om de multiplier te starten
$fac = 1;
//We maken een speciale input variable genaamd 'i' om te gebruiken in de while loop. Dit zorgt er voor dat we $input hetzelfde kunnen houden en op een kloppende manier kunnen gebruiken in de echo op het eind.
$i = $input;
//while loop opzetten
while ($i >= 1) {
    // Elk getal vanaf $input met voorgaande vereenvoudigen, bijv input=5 = 1x5 -> 5x4 -> 20x3 -> 60x2 -> 120x1
    $fac = $fac * $i;
    $i--;
}
// Printen
echo 'De faculteit van ' . $input . ' is ' . $fac . PHP_EOL;
