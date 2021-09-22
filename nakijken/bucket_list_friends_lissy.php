<?php

$input = readline("Hoeveel vrienden zal ik vragen om hun droom?" . PHP_EOL);
if (is_numeric($input) == false) {
    exit("($input) is geen getal, probeer het opnieuw");
}

$array = [];

for ($i = 1; $i <= $input; $i++) {
    $vriend_key = readline('Wat is jouw naam: ');
    $droom_value = readline('Wat is jouw droom: ');

    $array += [$vriend_key => $droom_value];
}
//  OLD CODE OF FELLOW STUDENT I IMPROVED
//  for ($i = 1; $i <= ($input); $i++) {
//  $vriend[readline("Wat is jouw naam?")] = readline("Wat is jouw droom?");
//}

foreach ($array as $key => $value) {
    echo $key . ' heeft dit als droom: ' . $value . PHP_EOL;
}
