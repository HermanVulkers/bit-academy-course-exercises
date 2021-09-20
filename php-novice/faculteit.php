<?php
//  Input getal invoeren
$input = readline('Van welk getal wil je de faculteit weten? ');
//  Fout input afvangen
if (is_numeric($input) == false) {
    exit($input . " is geen getal.");
} elseif ($input == "0") {
    exit("Faculteit met 0 berekenen kan niet.");
}
//  Fac geven we 1, omdat we straks met 1*i beginnen om de multiplier te starten
$fac = 1;
//  For loop opzetten
for ($i = $input; $i >= 1; $i--) {
    // Elk getal vanaf $input met voorgaande vereenvoudigen, bijv input=5 = 1x5 -> 5x4 -> 20x3 -> 60x2 -> 120x1
    $fac = $fac * $i;
}
// Printen
echo 'De faculteit van ' . $input . ' is ' . $fac . PHP_EOL;
