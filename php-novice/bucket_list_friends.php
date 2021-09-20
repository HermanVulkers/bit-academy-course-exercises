<?php

$vrienden = readline('Hoeveel vrienden zal ik vragen om hun droom? ');
$array = [];

if (is_numeric($vrienden) == false) {
    exit("Dit is geen getal." . PHP_EOL);
} else if ($vrienden == 0) {
    exit("Je hebt vast wel een vriend? Dit is geen geldige input." . PHP_EOL);
} else if ($vrienden < 0) {
    exit("Dit is geen geldige input." . PHP_EOL);
} else {
    for ($i = 1; $i <= $vrienden; $i++) {
        $naam_key = readline('Wat is jouw naam: ');
        $droom_value = readline('Wat is jouw droom: ');

        $array += [$naam_key => $droom_value];
        // OUDE CODE: $array[$naam_key] = $droom_value;
    }
    foreach ($array as $key => $value) {
        echo $key . ' heeft dit als droom: ' . $value . PHP_EOL;
    }
}
